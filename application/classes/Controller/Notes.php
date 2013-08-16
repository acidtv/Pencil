<?

class Controller_Notes extends Controller_Template {

	public $auth_required = array('login');

	public function action_index()
	{
		$view = new View('notes');

		$notes = ORM::factory('Note')
			->where('user_id', '=', $this->user()->pk())
			->order_by('id', 'desc')
			->find_all()
			->as_array();

		$markdown = new Markdown();

		foreach ($notes as &$note)
		{
			$note = $note->as_array();
			$note['text'] = $markdown->defaultTransform($note['text']);
		}

		$view->notes = $notes;
		$this->template->content = $view;
	}

	public function action_new()
	{
		$this->save_note();

		$view = new View('notes_new');
		$view->note = ORM::factory('Note')->as_array();
		$this->template->content = $view;
	}

	public function action_edit()
	{
		$this->save_note();

		$view = new View('notes_new');
		$view->note = ORM::factory('Note')
			->where('user_id', '=', $this->user()->pk())
			->and_where('id', '=', $this->request->param('id'))
			->find()
			->as_array();

		if ( ! $view->note['id'])
			throw new HTTP_Exception_403();

		$this->template->content = $view;
	}

	private function save_note()
	{
		if ($this->request->method() != 'POST')
		{
			return false;
		}

		$note = ORM::factory('Note', $this->request->param('id'));
		$note->values($this->request->post());
		$note->user_id = $this->user()->pk();
		$note->save();
		$this->redirect('/notes');
	}
}
