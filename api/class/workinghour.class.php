<?php

class workinghour {

    public function __construct() {
        $this->_db = db::getInstance();
    }

    public function save($data) {
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['modified_date'] = date('Y-m-d H:i:s');
        $id = $this->_db->insert('tms_workinghour', $data);
        if ($id) {
            $return['status'] = 200;
            $return['msg'] = 'Successfully Inserted.';
        } else {
            $return['status'] = 422;
            $return['msg'] = 'Not Saved.';
        }
        return $return;
    }

    public function getworkingByUser($userId) {
        $this->_db->where("user_id", $userId);
        $results = $this->_db->getOne('tms_workinghour');
        return $results;
    }
    public function update($id,$data) {
        $data['modified_date'] = date('Y-m-d H:i:s');
        $this->_db->where('wh_id', $id);
        $id = $this->_db->update('tms_workinghour', $data);
        if ($id) {
            $return['status'] = 200;
            $return['msg'] = 'Successfully Updated.';
        } else {
            $return['status'] = 422;
            $return['msg'] = 'Not Saved.';
        }
        return $return;
    }

}
