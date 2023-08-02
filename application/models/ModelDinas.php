<?php
/**
 *
 */
class ModelDinas extends CI_Model
{
  public function dinas_id()
  {
    $db = $this->TopModel->db();
    $sql = $db->query("SELECT * FROM tb_dinas ORDER BY dinas_id DESC");
    $data = $sql->fetch_assoc();
    if (empty($data['dinas_id'])) {
      $data['dinas_id'] = 0;
    }
    $dinas_id = $data['dinas_id'] + 1;

    return $dinas_id;
  }
  public function tambah($username)
  {
      if (empty($username)) {
          return 'Username tidak boleh kosong.';
      }
  
      // Check if the username already exists in the database
      $existing_user = $this->db->get_where('tb_users', array('user_username' => $username))->row();
      if ($existing_user) {
          return 'Username sudah digunakan. Pilih username lain.';
      }
  
      if ($this->input->post('button')) {
          if ($this->TopModel->upload('dinas_photo', 'img/dinas', 'png|jpg|jpeg|pdf', 1000000)) {
              $dinas_photo = $this->upload->data('file_name');
          } else {
              $dinas_photo = "logounsri.png";
          }

  
          $dinas_id = $this->dinas_id();
          $rand = rand(111111111, 999999999);
  
          // Get the input username and password from the form
          $input_username = $this->input->post('dinas_username');
          $input_password = $this->input->post('dinas_password');
  
          $data_dinas = array(
              'dinas_id' => $dinas_id,
              'dinas_nama' => $this->input->post('dinas_nama'),
              'dinas_photo' => $dinas_photo,
              'dinas_password' => $input_password, // Use the input password directly
              'dinas_email' => $this->input->post('dinas_email'),
              'dinas_entri' => date('Y-m-d H:i:s')
          );
  
          $data_user = array(
              'user_dinas_id' => $dinas_id,
              'user_username' => $this->input->post('dinas_nama'), // Use the input username directly
              'user_password' => $input_password, // Use the input password directly
              'user_entri' => date('Y-m-d H:i:s')
          );
  
          $insert_dinas = $this->db->insert('tb_dinas', $data_dinas);
          $insert_user = $this->db->insert('tb_users', $data_user);
  
          if ($insert_dinas && $insert_user) {
              if (!empty($this->input->post('dinas_email'))) {
                  // kirim notifikasi email ke admin
                  if ($this->TopModel->email_active == "on") {
                      $from = $this->TopModel->email_admin();
                      $to = $this->input->post('dinas_email');
                      $subject = "e-Izin membuat akun anda";
                      $pesan = "Username : " . $input_username . "<br> Password : " . $input_password;
                      $header = "From:" . $from;
                      mail($to, $subject, $pesan, $header);
                      
                  }
              }
  
              // Set success message in flashdata
              $this->session->set_flashdata('alert', 'success');
              $this->session->set_flashdata('message', 'Users berhasil disimpan.');
  
              // Redirect to display the success message
              redirect('dinas/tambah');
          } else {
              // Set error message in flashdata
              $this->session->set_flashdata('alert', 'error');
              $this->session->set_flashdata('message', 'Users gagal disimpan.');
  
              // Redirect to display the error message
              redirect('dinas/tambah');
          }
      }
  }
  
  public function changePassword($dinas_id, $new_password)
  {
    if (empty($new_password)) {
      return 'Password baru tidak boleh kosong.';
    }

    // Hash the new password before storing it in the database
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    $data_user = array(
      'user_password' => $hashed_password
    );

    $this->db->where('user_dinas_id', $dinas_id);
    $update_user = $this->db->update('tb_users', $data_user);

    if ($update_user) {
      return 'Password berhasil diubah.';
    } else {
      return 'Password gagal diubah.';
    }
  }
  
  public function edit($dinas_id)
  {
    if ($this->input->post('button')) {
      $dinas_photo_then = $this->input->post('dinas_photo_then');
      if ($this->TopModel->upload('dinas_photo','img/dinas','png|jpg|jpeg|pdf',100000)) {
        $dinas_photo = $this->upload->data('file_name');
        if ($dinas_photo_then!="logounsri.png") {
          unlink('./upload/img/dinas/'.$dinas_photo_then);
        }
      }
      else{
        $dinas_photo = $dinas_photo_then;
      }

      $data_dinas = array(
        'dinas_nama' => $this->input->post('dinas_nama'),
        'dinas_email' => $this->input->post('dinas_email'),
        'dinas_photo' => $dinas_photo,
      );

      $this->db->where('dinas_id',$dinas_id);
      $edit_dinas = $this->db->update('tb_dinas',$data_dinas);

      if ($edit_dinas) {
        return $this->TopModel->alert_success('Sukses','Users berhasil diupdate.');
      }
      else{
        return $this->TopModel->alert_success('Gagal','Users gagal diupdate.');
      }
    }
  }
}

 ?>
