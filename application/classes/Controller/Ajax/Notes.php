<?

class Controller_Ajax_Notes extends Controller_Ajax {

	public function action_index()
	{
		$notes = ORM::factory('Note')
			->find_all()
			->as_array();

		foreach ($notes as &$note)
		{
			$note = $note->as_array();
		}

		$this->response->body(json_encode($notes));
	}

	public function action_create()
	{
		$post = json_decode($this->request->body(), true);

		$note = ORM::factory('Note');
		$note->values($post);
		$note->save();

		$data = json_encode($note->as_array());
		$this->response->body($data);
	}

}
