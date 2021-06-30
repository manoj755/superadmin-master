
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of getManagers
 *
 * @author Admin
 */
$obj = new getManagers();
var_dump($obj->UpdateTree());

class getManagers {

    protected $allRole = array();
    protected $all_users_after = array();

    public function UpdateTree() {

        $this->all_users_after = array(
            array('id' => '2', 'manager' => '1')
            , array('id' => '4', 'manager' => '2')
            , array('id' => '5', 'manager' => '2')
            , array('id' => '6', 'manager' => '2')
            , array('id' => '13', 'manager' => '5')
            , array('id' => '14', 'manager' => '5')
            , array('id' => '15', 'manager' => '14')
            , array('id' => '16', 'manager' => '14')
            , array('id' => '3', 'manager' => '1')
            , array('id' => '7', 'manager' => '3')
            , array('id' => '8', 'manager' => '3')
            , array('id' => '9', 'manager' => '7')
            , array('id' => '10', 'manager' => '7')
            , array('id' => '11', 'manager' => '8')
            , array('id' => '12', 'manager' => '8'),
            array('id' => '1', 'manager' => null)
        );


        foreach ($this->all_users_after as $user) {
            $allchild = $this->GetAllChild($this->all_users_after, $user['id']);
            $this->allRole[$user['id']] = $allchild;
            // $this->SetToParent($allchild, $user['id']);
        }
        $this->SetToParent();
//        foreach ($this->all_users_after as $user) {
////            $allchild = $this->GetAllChild($this->all_users_after, $user['id']);
////            $this->allRole[$user['id']][] = $allchild;
//            $this->SetToParent($user['id']);
//        }
        return $this->allRole;
    }

    function hasChild($arr, $id) {
        foreach ($this->all_users_after as $user) {
            if ($user['manager'] === $id) {
                return true;
                break;
            }
        }
    }

    function GetAllChild($arr, $id) {
        $allid = array();
        if ($this->hasChild($arr, $id)) {
            foreach ($arr as $user) {
                if ($user['manager'] === $id) {
                    $allid[] = $user['id'];
                }
            }
        }
        return $allid;
    }

    protected $id;

    function SetToParent() {


        $allData = $this->allRole;
        foreach ($allData as $k1 => $v1) {
            $this->id = $k1;
            foreach ($allData as $k => $v) {

                $allids = $this->allRole[$this->id];
                $allids = $this->SetAllDataToKey($allids);
                $this->allRole[$this->id] = $allids;
            }
            //$this->TillRootParent($arr, $id);
        }
    }

    function SetAllDataToKey($allids) {
        $allidstemp = $allids;
        foreach ($allidstemp as $k => $v) {
            $data = $this->allRole[$v];
            foreach ($data as $v) {
                if (!in_array($v, $allids))
                    $allids[] = $v;
            }
        }
        return $allids;
    }

}
