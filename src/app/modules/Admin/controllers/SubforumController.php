<?php

declare(strict_types=1);

namespace ShukkaiKei\Modules\Admin\Controllers;

use ShukkaiKei\Models\Forum\Subforums;


class SubforumController extends ControllerBase
{

    public function indexAction()
    {
        $subforums = $this->toJson(Subforums::join('threads')->get());

        $this->view->subforums = $subforums;

    }

    public function createAction()
    {
    }

    public function storeAction()
    {
        $subforum = Subforums::init();
        $request = $this->checkCSRF($this->request);
        $subforum->fill(
            [
                'name' => $request->getPost('name'),
                'description' => $request->getPost('desc'),
            ]

        )->save();

        if ($subforum) {
            $this->flashSession->success('Subforum successfully added');
        } else {
            $this->flashSession->error('Failed to create new Subforum');
        }
        $this->response->redirect('Admin/subforum/index');
    }

    public function editAction($id)
    {

        $uid = $this->toID($id);
        $subforum = Subforums::findById($uid);

        $this->view->subforum = $subforum;
        $this->view->pick('subforum/edit');
    }

    public function updateAction($id)
    {
        $request = $this->checkCSRF($this->request);
        $uid = $this->toID($id);
        $name = $request->getPost("name");
        $desc = $request->getPost("desc");

        $subforum = Subforums::findById($uid);
        $subforum->name = $name;
        $subforum->desc = $desc;
        $subforum->save();

        if ($subforum) {
            $this->flashSession->success('Subforum successfully updated');
        } else {
            $this->flashSession->error('Failed to update subforum');
        }
        $this->response->redirect('Admin/subforum/index');
    }

    public function deleteAction($id)
    {
        $uid = $this->toID($id);
        $subforum = Subforums::findById($uid);
        $subforum->delete();

        if ($subforum) {
            $this->flashSession->success('Subforum successfully removed');
        } else {
            $this->flashSession->error('Failed to remove subforum');
        }
        $this->response->redirect('Admin/subforum/index');
    }
}