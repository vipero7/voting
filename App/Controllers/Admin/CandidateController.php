<?php 

namespace App\Controllers\Admin;
use App\Models\Candidate;

class CandidateController
{
	public function index()
	{
		$searchkey = '';
		if(isset($_GET['searchkey'])) {
			$searchkey = $_GET['searchkey'];
		}
		$candidate = new Candidate();
		
		$pg = 1;
		$limit = 10;

		if(isset($_GET['pg']) && $_GET['pg']){
			$pg = $_GET['pg'];
		}
		
		$offset = ($pg - 1) * $limit;
		

		$candidates = $candidate->getCandidates($offset, $limit, $searchkey);
		$total = $candidate->totalRecords();

		$noofpages = ceil($total / $limit);

		$pagination = [
			'cp'  			=> $pg,
			'offset'		=> $offset,
			'nop' 			=> $noofpages
		];
		
		view('admin/candidate/list', compact('candidates', 'pagination'));
	}

	public function add()
	{
		$errors = [];

		if($_POST){
			$id 			= $_POST['id'];
			$name 			= $_POST['name'];
			$age 			= $_POST['age'];
			$sex			= $_POST['sex'];
			$party 			= $_POST['party'];
			$description	= $_POST['description'];
			$image 			= '';

			if($_FILES['image']['error'] > 0){
					$errors['image'] = "Please Choose Image";
			} else{
				$allowed = [
					'image/png',
					'image/jpg',
					'image/jpeg'
				];
				if(in_array($_FILES['image']['type'], $allowed)){
					$filename = time() . '_' . $_FILES['image']['name'];
					$filepath = '/assets/uploads/' . $filename;
					$destination = ROOT_PATH . $filepath;

					if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
						$image = $filepath;
					}
				} else {
					$errors['image'] = "Image type not allowed";
				}
			}
					
			
			if(!$errors){
					$candidate = new Candidate();
					$data = [
						'id'          => $id,
						'name'        => $name,
						'age'         => $age,
						'sex'         => $sex,
						'party'       => $party,
						'description' => $description,
						'image'       => $image
				   	];
				  	$status = $candidate -> save($data);
				    if($status) {
				 	  $_SESSION['success'] = "Successfully Inserted";
				    } else {
					  $_SESSION['error']  = "Error Inserting";
				    }
			        redirect('/admin/candidate/add');
			    }
			}
		
		view('admin/candidate/add', compact('errors'));
	}

	public function edit($request)
	{
		$id = $request->id;
		$candidate = new Candidate();
		$cinfo = $candidate -> getInfo($id);
		// echo $id;
		// echo 'edit form goes here';

		if($_POST){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$age = $_POST['age'];
			$sex = $_POST['sex'];
			$party = $_POST['party'];
			$description = $_POST['description'];

			$image = $cinfo['image'];

			if($_FILES['image']['error'] == 0){
				$filename = time() . '_' . $_FILES['image']['name'];
					$filepath = '/assets/uploads/' . $filename;
					$destination = ROOT_PATH . $filepath;

					if(move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
						if(is_file($image)){
							unlink($image);
						}
						
						$image = $filepath;
					}
				}


				$data = [
						'id'          => $id,
						'name'        => $name,
						'age'         => $age,
						'sex'         => $sex,
						'party'       => $party,
						'image'       => $image,
						'description' => $description
				];
				$status = $candidate -> update($data, $id);
				if($status) {
				 	$_SESSION['success'] = "Successfully updated";
				} else {
					$_SESSION['error']  = "Error updating";
				}
				redirect('/admin/candidate/edit/' . $id);

		}

		view('admin/candidate/edit', compact('cinfo'));
	}

	public function delete($request)
	{
		$id = $request->id;
		$candidate = new Candidate();
		$cinfo = $candidate->getInfo($id);

		if($cinfo){
			$status = $candidate->delete($id);
			$oldimage = ROOT_PATH . $cinfo['image'];
			if(is_file($oldimage)){
				unlink($oldimage);
		    }
			if($status) {
				$_SESSION['success'] = "Successfully deleted";
		    } else {
			$_SESSION['error']  = "Error deleting";
		}
	}
	
	redirect('/admin/candidate');
	}	
	
} 