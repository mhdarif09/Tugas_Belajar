<?php
/**
 *
 */
class Dinas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->TopModel->encription_page('admin');
    $this->load->model('ModelDinas');
  }
  public function index()
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->order_by('dinas_entri','asc');
    $data['data_dinas'] = $this->db->get()->result();
    $data['tag'] = null;
    // breadcrumb
    $breadcrumb['data'] = array('home','User');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('dinas/home',$breadcrumb,$data,"Users");
  }
  public function tag($value)
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->order_by('dinas_entri','asc');
    $data['data_dinas'] = $this->db->get()->result();
    $data['tag']        = str_replace('-',' ',$value);
    // breadcrumb
    $breadcrumb['data'] = array('home','Users');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('dinas/home',$breadcrumb,$data,"Users");
  }
 public function tambah()
    {
        $this->load->model('ModelDinas');
        if ($this->input->post('button')) {
            $username = $this->input->post('dinas_user');
            $validation_error = $this->ModelDinas->tambah($username);

            if ($validation_error !== null) {
                // If there's a validation error, store it in flashdata
                $this->session->set_flashdata('error', $validation_error);
            } else {
                // If there's no validation error, continue with the rest of your logic
                // ...

                // Store success message in flashdata
                $this->session->set_flashdata('success', 'Users berhasil disimpan.');
            }
            redirect('dinas/tambah'); // Redirect to the tambah view to display messages
            return; // Stop the execution here to avoid loading the view directly
        }

        // Load view
        $data['data_model'] = null; // Assuming you want to load data for the view here
        $breadcrumb['data'] = array('home', 'User', 'tambah user');
        $breadcrumb['link'] = array('', 'dinas');
        // get template
        $this->TopModel->get_template('dinas/tambah', $breadcrumb, $data, "Users");
    }
    public function changePassword()
    {
      $dinas_id = 1; // Replace this with the logged-in user's dinas_id or get it from the session
  
      if ($this->input->post('button')) {
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
  
        if ($new_password !== $confirm_password) {
          // Password and Confirm Password do not match
          $this->session->set_flashdata('alert', 'error');
          $this->session->set_flashdata('message', 'Password and Confirm Password do not match.');
  
          redirect('dinas/edit/'.$dinas_id); // Redirect back to the edit page
        }
  
        // Load the ModelDinas model
        $this->load->model('ModelDinas');
  
        // Call the changePassword method to update the password
        $result = $this->ModelDinas->changePassword($dinas_id, $new_password);
  
        $this->session->set_flashdata('alert', 'success');
        $this->session->set_flashdata('message', $result);
  
        redirect('dinas/edit/'.$dinas_id); // Redirect back to the edit page
      }
    }
  public function hapus()
  {
    if (isset($_POST['dinas_id'])) {
      // delete attachment
      foreach ($this->db->get_where('tb_dinas',array('dinas_id'=>$_POST['dinas_id']))->result() as $data) {
        if ($data->dinas_photo != "logounsri.png") {
          unlink('./upload/img/dinas/'.$data->dinas_photo);
        }
        rmdir('./upload/attachment/dinas'.$data->dinas_id);
      }
      // delete dinas
      $this->db->where('dinas_id',$_POST['dinas_id']);
      $this->db->delete('tb_dinas');
      // delete users
      $this->db->where('user_dinas_id',$_POST['dinas_id']);
      $this->db->delete('tb_users');
    }
  }

  public function edit($dinas_id)
  {
    // data model
    $data['data_model'] = $this->ModelDinas->edit($dinas_id);
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->where('dinas_id',$dinas_id);
    $this->db->order_by('dinas_entri','desc');
    $data['data_dinas'] = $this->db->get()->result();

    // breadcrumb
    $breadcrumb['data'] = array('home','User','edit User');
    $breadcrumb['link'] = array('','dinas');
    // get template
    $this->TopModel->get_template('dinas/edit',$breadcrumb,$data,"Users");
  }

  public function printd($value='')
  {
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->order_by('dinas_entri','desc');
    $data = $this->db->get()->result();
    $this->load->view('template/meta_print');
    ?>
    <style media="screen">
      td,th{
        padding: 8px;
      }
    </style>
    <table style="font-family:sans-serif;width:100%;border-collapse: collapse;">
      <tr>
        <th style="border:1px solid #333;">No</th>
        <th style="border:1px solid #333;">Users</th>
        <th style="border:1px solid #333;">Username</th>
        <th style="border:1px solid #333;">Password</th>
      </tr>
      <tr>
        <?php
        $no = 1;
        foreach ($data as $key) {
          ?>
          <tr>
            <td style="border:1px solid #333;text-align:center;"><?php echo $no; ?></td>
            <td style="border:1px solid #333;"><?php echo $key->dinas_nama; ?></td>
            <td style="border:1px solid #333;text-align:center;"><?php echo $key->user_username; ?></td>
            <td style="border:1px solid #333;text-align:center;"><?php echo $key->dinas_password; ?></td>
          </tr>
          <?php
          $no++;
        }
         ?>
      </tr>
    </table>
    <script type="text/javascript">
      if (!window.print()) {
      }
    </script>
    <?php
  }

}

 ?>
