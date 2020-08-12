<?php



class  Prescription_model extends CI_Model {

	

	public function __construct(){

		

		$this->doctorName      ="";

		$this->firstName      ="";

		$this->appointmentId      ="";

		$this->prescriptionId      ="";

		$this->patientId    ="";

		$this->doctorId    ="";

		$this->insDate         ="";

		$this->paymentId     ="";

		$this->prescriptionNotes     ="";

		$this->totalAmount     ="";

		$this->status     ="";

		$this->sortColumn 	  		= '';

		$this->sortDirection  	= '';

		$this->load->database();

		$this->load->library('upload');

		$this->setPostGetVars();

		

	}

	public function setPostGetVars(){	



			$this->appointmentId						    = $this->input->post_get('appointmentId');

			$this->prescriptionId						    = $this->input->post_get('prescriptionId');

			$this->patientId						= $this->input->post_get('patientId');

			$this->doctorName						    = $this->input->post_get('doctorName');

			$this->firstName						= $this->input->post_get('firstName');

			$this->doctorId                          = $this->input->post_get('doctorId');

			$this->insDate                           = trim($this->input->post_get('insDate'));

			$this->paymentId						= $this->input->post_get('paymentId');

			$this->prescriptionNotes						= $this->input->post_get('prescriptionNotes');

			$this->totalAmount                           = trim($this->input->post_get('totalAmount'));

			$this->status						= $this->input->post_get('status');

					

		

	}

	

	

	

	public function getPrescription($limit = NULL, $start = NULL)

		{	

			$this->db->limit($limit, $start);

			

			$this->db->select('

								axprescriptions.*,

								axdoctors.doctorName,

								axdoctors.uniqueId as doctorCode,

								axpatient.firstName,

								axpatient.lastName,

								axpatient.uniqueId as patientCode,

								axappointments.appointmentId

								');

			

			$this->db->from('axprescriptions');

			$this->db->join('axdoctors', 'axdoctors.doctorId = axprescriptions.doctorId', 'left');

			$this->db->join('axappointments', 'axappointments.appointmentId = axprescriptions.appointmentId', 'left');

			

			$this->db->join('axpatient', 'axpatient.patientId = axprescriptions.patientId', 'left');

			if($this->prescriptionId != "")

				$this->db->where('axprescriptions.prescriptionId', $this->prescriptionId);

			if($this->appointmentId != "")

				$this->db->where('axprescriptions.appointmentId', $this->appointmentId);

			

			if(trim($this->patientId)!= "")

				$this->db->where('axprescriptions.patientId ', $this->patientId );

			if(trim($this->prescriptionNotes)!= "")

				$this->db->like('axprescriptions.prescriptionNotes ', $this->prescriptionNotes );

				

			if($this->doctorId != "")

				$this->db->where('axprescriptions.doctorId', $this->doctorId);

				

			if(trim($this->totalAmount) != "")

				$this->db->where('axprescriptions.totalAmount', $this->totalAmount);

			if(trim($this->paymentId) != "")

				$this->db->where('axprescriptions.paymentId', $this->paymentId);

			if(trim($this->insDate) != "")

				$this->db->where('axprescriptions.insDate', $this->insDate);

			if(trim($this->doctorName) != "")

				$this->db->like('axdoctors.doctorName', $this->doctorName);

			if(trim($this->firstName) != "")

				$this->db->like('axpatient.firstName', $this->firstName);
			
			if(trim($this->status) != "")

				$this->db->where('axprescriptions.status', $this->status);
				

			if($this->sortColumn == '')

				$this->sortColumn = "prescriptionId";

			

			if($this->sortDirection == '')

				$this->sortDirection = "DESC";	

						

			$this->db->order_by("$this->sortColumn", "$this->sortDirection");

			

			$query = $this->db->get();

			// echo $this->db->last_query(); exit; 

			return $query->result_array();



		}

	public function getPrescription_id($prescriptionId = NULL)

		{	

			

			

			$this->db->select('

								axprescriptions.*,

								axdoctors.doctorName,

								axpatient.firstName,

								axappointments.appointmentId

								');

			

				$this->db->from('axprescriptions');

			$this->db->join('axdoctors', 'axdoctors.doctorId = axprescriptions.doctorId', 'left');

			$this->db->join('axappointments', 'axappointments.appointmentId = axprescriptions.appointmentId', 'left');

			$this->db->join('axpatient', 'axpatient.patientId = axprescriptions.patientId', 'left');

			$this->db->where('axprescriptions.prescriptionId',$prescriptionId);

			

			$query = $this->db->get();

			// echo $this->db->last_query(); exit; 

			return $query->result_array();



		}





		public function updatePrescription($prescriptionId) { 

			$this->load->helper('url');

			

			$data = array(

				'totalAmount' => $this->input->post('totalAmount'),

				'status'    => $this->input->post('status'),

				

				

			);

			$this->db->set($data); 

			$this->db->where("prescriptionId", $prescriptionId); 

			$this->db->update("axprescriptions", $data); 

			$this->prescriptionId = $prescriptionId;

			

			return $prescriptionId;

		} 



	

		public function get_count() {

			

			if($this->appointmentId != "")

				$this->db->where('appointmentId', $this->appointmentId);

			if($this->prescriptionId != "")

				$this->db->where('prescriptionId', $this->prescriptionId);

			

				if(trim($this->patientId  )!= "")

				$this->db->like('patientId ', $this->patientId );

				

			if($this->doctorId != "")

				$this->db->where('doctorId', $this->doctorId);

				

			if(trim($this->insDate) != "")

				$this->db->where('insDate', $this->insDate);

				

				

			

			if(trim($this->prescriptionNotes) != "")

				$this->db->like('prescriptionNotes', $this->prescriptionNotes);

			if(trim($this->totalAmount) != "")

				$this->db->where('totalAmount', $this->totalAmount);

			if(trim($this->paymentId) != "")

				$this->db->where('paymentId', $this->paymentId);

			

				if(trim($this->status) != "")

				$this->db->like('status', $this->status);

				

			if($this->sortColumn == '')

				$this->sortColumn = "prescriptionId";

			$this->db->from("axprescriptions");

			return $this->db->count_all_results();

		}

		

		

}

?>