<?php 

class Web_model {

	private $table='t_masjid';
	private $db;

	public function __construct(){
		$this->db = new database;
	}

	public function getAllMasjid()
	{
		$this->db->query("SELECT * FROM t_masjid");
	 		return $this->db->resultSet();
	}

	public function getAllZakat()
	{
		include "app/config/koneksi.php";
		$i=0;

		$cek_penerima=$db->query("SELECT count(id_penerima) as total_penerima FROM t_penerima ");
		while ($lihat=$cek_penerima->fetch()){
			$total_penerima = $lihat['total_penerima'];
			$data[$i]['total_penerima']=$total_penerima;
			$i++;
		}

		$ii=0;
		$iii=0;
		$cek_masjid=$db->query("SELECT * FROM t_masjid ");
		while ($lihat_masjid=$cek_masjid->fetch()){
			$id_masjid = $lihat_masjid['id_masjid'];
				
				$total_beras=0;
				$total_uang=0;
				$cek_zakat=$db->query("SELECT * FROM t_pembayaran JOIN t_pembayar USING(id_pembayar) JOIN t_amil USING(id_amil) join t_zakat using(id_zakat) join t_masjid where t_pembayar.id_masjid = t_masjid.id_masjid and t_pembayar.id_masjid = '$id_masjid'");
				while ($lihat_zakat=$cek_zakat->fetch()){
					$jml = $lihat_zakat['total_pembayaran'];
                    $jml2 = strlen($jml);

					if ($jml2 <= 4 ) { 
                        $total_beras = $total_beras+$lihat_zakat['total_pembayaran']; 
					}
					else{
						$total_uang = $total_uang+$lihat_zakat['total_pembayaran']; 
					}                          
					
				}
			$data[$ii]['id_masjid']=$lihat_masjid['id_masjid'];
			$data[$ii]['nama_masjid']=$lihat_masjid['nama_masjid'];
			$data[$ii]['total_beras']=$total_beras;
			$data[$ii]['total_uang']=$total_uang;
			$ii++;
		}


		return $data;
	}

	public function getAllContact()
	{
		$this->db->query("SELECT * FROM t_kritik_saran");
	 		return $this->db->resultSet();
	}


	public function tambahContact($data)
	{
		$tgl_saran=date("Y-m-d");

		$query = "INSERT INTO t_kritik_saran
		VALUES ('', :tgl_saran, :nama_saran, :subjek_saran, :saran)";
		$this->db->query($query);
		$this->db->bind('tgl_saran', $tgl_saran);
		$this->db->bind('nama_saran', $data['nama_saran']);
		$this->db->bind('subjek_saran', $data['subjek_saran']);
		$this->db->bind('saran', $data['saran']);
		$this->db->execute();

		echo 
			"<script>
	            alert('Kritik dan Saran anda berhasil dikirim, terimakasih atas masukannya');
	            document.location.href='".BASEURL."/Web/contact'
	        </script>
	        ";

	}

	public function simpanDonasi($data)
	{
		include "app/config/koneksi.php";

		$cek_donatur=$db->query("SELECT count(id_donasi) as total_donatur FROM t_donasi ");
		while ($lihat=$cek_donatur->fetch()){
			$hitung_donatur = $lihat['total_donatur']+1;
		}

		$tgl_donasi = date("Y-m-d");

		$nama_file = $_FILES['foto']['tmp_name'];
		$file_upload = $_FILES['foto']['name'];
		$type = $_FILES['foto']['type'];
		$ex=explode('/', $type);
		$namabaru = "bukti".$hitung_donatur.'.'.$ex[1];
		$file = str_replace(" ","_","$namabaru");
		$folder = "./assets/img/bukti_donasi/$file";

		if(move_uploaded_file("$nama_file","$folder")){
		$query = "INSERT INTO t_donasi
		VALUES ('',:nama_donatur, :no_hp_donatur, :alamat_donatur, :tgl_donasi, :total_donasi, :bukti_donasi, '', '', '2')";
		$this->db->query($query);
		$this->db->bind('nama_donatur', $data['nama_donatur']);
		$this->db->bind('no_hp_donatur', $data['no_hp_donatur']);
		$this->db->bind('alamat_donatur', $data['alamat_donatur']);
		$this->db->bind('tgl_donasi', $tgl_donasi);
		$this->db->bind('total_donasi', $data['total_donasi']);
		$this->db->bind('bukti_donasi', $folder);
		$this->db->execute();
		}

		return $this->db->rowCount();

	}
}