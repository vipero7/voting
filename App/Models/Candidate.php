<?php 

namespace App\Models;

use System\Library\Model;

class Candidate extends Model
{
	public function __construct()
	{
		parent:: __construct();
	}

	public function totalRecords()
	{
		$sql = "SELECT count(*) as total FROM candidates";
		$total = $this->db->find($sql);
		return $total['total'];
	}

	public function getCandidates($offset, $limit, $sk = '')
	{
		$sql = "SELECT * FROM candidates ";
		if($sk){
			$sql .= " WHERE name LIKE '%$sk%' ";
		}
		$sql .= " LIMIT $offset, $limit";

		$candidates = $this->db->query($sql);
		// debug($candidates);
		return $candidates;
	}

	public function getInfo($id)
	{
		$sql = "SELECT * FROM candidates WHERE id='{$id}'";
		// debug($this->db);
		$candidate = $this->db->find($sql);
		// debug($candidates);
		return $candidate;
	}

	public function save($data)
	{
		$sql= "INSERT INTO candidates 
			(
				id, 
				name, 
				age, 
				sex, 
				party, 
				description, 
				image
			)
			VALUES
			(
				'{$data['id']}', 
				'{$data['name']}', 
				'{$data['age']}', 
				'{$data['sex']}', 
				'{$data['party']}', 
				'{$data['description']}', 
				'{$data['image']}'
		    )";

		return $this -> db ->execute($sql);
	}

	public function update($data, $id)
	{
		$sql = "UPDATE candidates SET
			id 			= '{$data['id']}',
			name 		= '{$data['name']}',
			age 		= '{$data['age']}',
			sex 		= '{$data['sex']}',
			party 		= '{$data['party']}',
			image 		= '{$data['image']}',
			description = '{$data['description']}'
			WHERE id='{$id}'
			";

			return $this->db->execute($sql); 

	}

	public function delete($id)
	{
		$sql = "DELETE FROM candidates WHERE id='{$id}'";
		return $this->db->execute($sql);
	}
}