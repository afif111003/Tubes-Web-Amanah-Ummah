<?php 

class Masjid_model {

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

	public function getMasjidById($id)
	{

		$this->db->query('SELECT * FROM '.$this-> table .' WHERE id_masjid=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahDataMasjid($data)
	{
		$query = "INSERT INTO t_masjid
		VALUES ('', :nama_masjid, :alamat_masjid, :RT, :RW)";
		$this->db->query($query);
		$this->db->bind('nama_masjid', $data['nama_masjid']);
		$this->db->bind('alamat_masjid', $data['alamat_masjid']);
		$this->db->bind('RT', $data['RT']);
		$this->db->bind('RW', $data['RW']);
		$this->db->execute();

		return $this->db->rowCount();

	}
	
	public function cariMasjid(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM t_masjid WHERE nama_masjid LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword',"%$keyword%");
		return $this ->db->resultSet();
		
	}
	public function hapusDataMasjid($id){
		$query = "DELETE FROM ". $this->table ." WHERE id_masjid= :id_masjid";
		$this->db->query($query);
		$this->db->bind('id_masjid',$id);
		$this->db->execute();
		return $this ->db->rowCount();
		
	}

	public function ambilDataMasjid($id)
	{
		$this->db->query('SELECT * FROM '.$this-> table .' WHERE id_masjid=:id_masjid');
		$this->db->bind('id_masjid',$id);
		return $this->db->single();
	}

	public function editDataMasjid($data){
		$query = "UPDATE t_masjid SET 
		nama_masjid= :nama_masjid,
		alamat_masjid= :alamat_masjid,
		RT= :RT,
		RW= :RW
		WHERE id_masjid = :id_masjid ";

		$this->db->query($query);
		$this->db->bind('id_masjid', $data['id_masjid']);
		$this->db->bind('nama_masjid', $data['nama_masjid']);
		$this->db->bind('alamat_masjid', $data['alamat_masjid']);
		$this->db->bind('RT', $data['RT']);
		$this->db->bind('RW', $data['RW']);
		$this->db->execute();

		return $this->db->rowCount();
	}

}