<?php

/**
 *
 */
class Ib extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->TopModel->encription_page('user');
    $this->load->model('ModelIb');
  }
  public function index()
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelIb->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_type','IB');
    $this->db->order_by('biodata_entri','DESC');
    $data['data_table'] = $this->db->get()->result();
    $data['data_sort'] = "semua";
    $data['data_page'] = [
      'parent' => 'Pengajuan',
      'child' => 'list persyaratan',
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','Pengajuan');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('ib/ib_home',$breadcrumb,$data,"Pengajuan");
  }
  public function tag($value)
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelIb->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_status',str_replace('-',' ',$value));
    $this->db->where('eizin_type','IB');
    $this->db->order_by('biodata_entri','DESC');
    $data['data_table'] = $this->db->get()->result();
    $data['data_sort'] = str_replace('-',' ',$value);
    $data['data_page'] = [
      'parent' => 'Pengajuan',
      'child' => $data['data_sort'],
    ];

    // breadcrumb
    $breadcrumb['data'] = array('home','Pengajuan');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('ib/ib_home',$breadcrumb,$data,"Pengajuan");
  }
  public function tambah()
  {
    // data model
    $data['data_model'] = $this->ModelIb->tambah();
    // breadcrumb
    $breadcrumb['data'] = array('home','Pengajuan','tambah biodata');
    $breadcrumb['link'] = array('','ib');
    $data['data_page'] = [
      'parent' => 'Pengajuan',
      'child' => 'Tambah Biodata'
    ];
    // get template
    $this->TopModel->get_template('ib/ib_tambah',$breadcrumb,$data,"Pengajuan");
  }
  public function view($eizin_id)
  {
    // data model
    if ($this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'),'eizin_id'=>$eizin_id))->num_rows() == 0) {
      redirect(URL."ib");
    }
    $data['data_model'] = $this->ModelIb->edit($eizin_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelIb->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $this->db->where('eizin_type','IB');
    $data['data_table'] = $this->db->get()->result();
    $data['eizin_id'] = $eizin_id;
    $data['data_page'] = [
      'parent' => 'Pengajuan',
      'child' => 'Lihat Persyaratan'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','Pengajuan','lihat');
    $breadcrumb['link'] = array('','ib');
    // get template
    $this->TopModel->get_template('ib/ib_view',$breadcrumb,$data,"Pengajuan");
  }

  public function input($eizin_id,$at_id)
  {
    // data model
    $data['data_model'] = $this->ModelIb->edit($eizin_id);
    $data['data_upload'] = $this->ModelIb->upload($eizin_id,$at_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelIb->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $this->db->where('eizin_type','IB');
    $data['data_table'] = $this->db->get()->result();
    $data['eizin_id'] = $eizin_id;
    $data['at_id'] = $at_id;
    $data['data_page'] = [
      'parent' => 'Pengajuan',
      'child' => 'Input Lampiran'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','Pengajuan','lihat','input lampiran');
    $breadcrumb['link'] = array('','ib','ib/'.$eizin_id."/view");
    // get template
    $this->TopModel->get_template('ib/ib_input',$breadcrumb,$data,"Pengajuan");
  }

  public function send()
  {
    $data_id = $_POST['data_id'];
    if (isset($data_id)) {
      $data = array('eizin_status'=>'terkirim','eizin_date_kirim'=>date('Y-m-d H:i:s'));
      $this->db->where('eizin_type','IB');
      $this->db->where('eizin_id',$data_id);
      $this->db->update('tb_eizin',$data);

      // notif to dinas
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->join('tb_users','tb_users.user_dinas_id = tb_dinas.dinas_id');
      $this->db->where(array('eizin_id'=>$data_id));
      $sql_dinas = $this->db->get_where()->result();
      foreach ($sql_dinas as $data) {
        // kirim notifikasi email ke admin
        if (!empty($data->dinas_email)) {
          if ($this->TopModel->email_active == "on") {
            $from = $data->dinas_email;
            $to = $this->TopModel->email_admin();
            $subject = "Dinas ".$data->dinas_nama." Mengirimkan Persyaratan Pengajuan atas nama ".$data->biodata_nama;
            $pesan = "Verifikasi untuk dilanjutkan ke Admin 2";
            $header = "From:".$from;
            mail($to,$subject,$pesan,$header);
          }
        }

        $data = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $this->TopModel->admin1_id(),
          'notif_eizin_id' => $data->eizin_id,
          'notif_title' => $data->dinas_nama. ' : Mengirimkan Persyaratan Pengajuan atas nama '.$data->biodata_nama,
          'notif_type' => 'kirim admin1',
          'notif_text' => $data->dinas_nama.'Mengirim Persyaratan Pengajuan '.$data->biodata_nama,
          'notif_link' => 'ib/'.$data->dinas_id."/".$data->eizin_id.'/terkirim',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tb_notif',$data);
      }
    }
  }

  public function edit($eizin_id,$at_id)
  {
    // data model
    $data['data_model'] = $this->ModelIb->edit($eizin_id);
    $data['data_upload'] = $this->ModelIb->edit_upload($eizin_id,$at_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelIb->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $data['data_table'] = $this->db->get()->result();
    $data['data_attachment'] = $this->db->get_where('tb_attachment',array('attachment_eizin_id'=>$eizin_id,'attachment_at_id'=>$at_id))->result();
    $data['eizin_id'] = $eizin_id;
    $data['at_id'] = $at_id;
    $data['data_page'] = [
      'parent' => 'Pengajuan',
      'child' => 'Edit Lampiran'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','Pengajuan','lihat','edit lampiran');
    $breadcrumb['link'] = array('','ib','ib/'.$eizin_id."/view");
    // get template
    $this->TopModel->get_template('ib/ib_edit',$breadcrumb,$data,"Pengajuan");
  }

  public function hapus($eizin_id,$at_id)
  {
    // data model
    $data['data_model'] = $this->ModelIb->edit($eizin_id);
    $data['data_upload'] = $this->ModelIb->hapus_upload($eizin_id,$at_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelIb->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $data['data_table'] = $this->db->get()->result();
    $data['data_attachment'] = $this->db->get_where('tb_attachment',array('attachment_eizin_id'=>$eizin_id,'attachment_at_id'=>$at_id))->result();
    $data['eizin_id'] = $eizin_id;
    $data['at_id'] = $at_id;
    $data['data_page'] = [
      'parent' => 'Pengajuan',
      'child' => 'Hapus Lampiran'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','Pengajuan','lihat','hapus lampiran');
    $breadcrumb['link'] = array('','ib','ib/'.$eizin_id."/view");
    // get template
    $this->TopModel->get_template('ib/ib_hapus',$breadcrumb,$data,"Pengajuan");
  }

  public function print_kartu($eizin_id)
  {
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
    $this->db->where('eizin_id',$eizin_id);
    $data['eizin_id'] = $eizin_id;
    $data['eizin_type'] = "ib";
    $data['data_ib'] = $this->db->get()->result();
    $data['tanggal_cetak'] = date('Y-m-d');

    $this->load->view('template/kartu/print',$data);
  }

  
  
  public function hapus_data()
  {
    $data_id = $_POST['data_id'];
    if(isset($data_id)){
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_attachment','tb_attachment.attachment_eizin_id = tb_eizin.eizin_id');
      $this->db->where('eizin_id',$data_id);
      foreach ($this->db->get()->result() as $data) {
        unlink('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/ib'.$data_id.'/'.$data->attachment_file_name);
      }
      rmdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/ib'.$data_id);

      $this->db->where('eizin_id',$data_id);
      $this->db->delete('tb_eizin');
      $this->db->where('biodata_eizin_id',$data_id);
      $this->db->delete('tb_biodata');
      $this->db->where('attachment_eizin_id',$data_id);
      $this->db->delete('tb_attachment');
    }
  }
}


 ?>
