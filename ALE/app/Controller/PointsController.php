<?php

class PointsController extends AppController {

    var $helpers = array('Html', 'Form', 'Cache');
    public $components = array('Cookie', 'Email');
    public $paginate = array(
        'limit' => 10
    );

    /** @Created:     23-Jun-2014
     * @Method :     function beforeFilter
     * @Author:      Prateek Jadhav
     * @Modified :   ---
     * @Purpose:     Rendered before any function
     * @Param:       none
     * @Return:      none
     */
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('postEventsOnFacebook');
    }

    /** @Created:     23-Jun-2014
     * @Method :     function admin_setPoint
     * @Author:      Prateek Jadhav
     * @Modified :   ---
     * @Purpose:     Manage point price
     * @Param:       none
     * @Return:      none
     */
    public function admin_setPoint() {
        $this->layout = "admin/admin";
        $this->set("point", $this->Point->find("first"));
    }

    /** @Created:     23-Jun-2014
     * @Method :     function admin_changePrice
     * @Author:      Prateek Jadhav
     * @Modified :   ---
     * @Purpose:     change point price
     * @Param:       price
     * @Return:      0/1
     */
    public function admin_changePrice($price = NULL) {
        $this->layout = FALSE;
        $this->autoRender = FALSE;
        if ($price) {
            $data["Point"]["id"] = 1;
            $data["Point"]["price"] = $price;
            if ($this->Point->save($data)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /* @Created:     31-July-2014
     * @Method :     function admin_list
     * @Author:      Prateek Jadhav
     * @Modified :   ---
     * @Purpose:     To list points rate
     * @Param:       none
     * @Return:      none
     */

    public function admin_list() {
        $this->layout = "admin/admin";
        $this->loadModel("BuyPoint");
        $datas = $this->paginate('BuyPoint');
        $this->set("datas", $datas);
    }
    
    
    /* @Created:     31-July-2014
     * @Method :     function admin_add
     * @Author:      Prateek Jadhav
     * @Modified :   ---
     * @Purpose:     To list points rate
     * @Param:       $buy_point_id/none
     * @Return:      none
     */
    
    public function admin_add($buy_point_id = NULL){
        $this->layout = "admin/admin";
        $this->loadModel("BuyPoint");
        if($this->data){
            if($this->BuyPoint->save($this->data)){
                $this->Session->setFlash("Points has been saved","default",array("class"=>"green"));
                $this->redirect(array("controller"=>"Points","action"=>"list"));
            } else {
                $this->Session->setFlash("Points could not be saved, try again","default",array("class"=>"red"));
            }
        }
        if($buy_point_id){
            $buy_point_id = base64_decode($buy_point_id);
            $this->request->data = $this->BuyPoint->findById($buy_point_id);
        }
    }
    
     /*@Created:     1-Aug-2014
     * @Method :     function getPointPrice
     * @Author:      Prateek Jadhav
     * @Modified :   ---
     * @Purpose:     Function for get Point Price by id
     * @Param:       buyPoint_id
     * @Return:      0/$price
     */
    
    public function getPointPrice($buyPoint_id = NULL){
        $this->layout = FALSE;
        $this->autoRender = FALSE;
        $this->loadModel("BuyPoint");
        if($buyPoint_id){
            $detail = $this->BuyPoint->findById($buyPoint_id);
            if(!empty($detail)){
                $price = $detail["BuyPoint"]["price"];
                return $price;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    
     /*@Created:     1-Aug-2014
     * @Method :     function buyNow
     * @Author:      Prateek Jadhav
     * @Modified :   ---
     * @Purpose:     Function for create package for buy no of points
     * @Param:       none
     * @Return:      none
     */
    
    public function buyNow(){
        $this->layout = FALSE;
        $this->autoRender = FALSE;
        $this->loadModel("BuyPoint");
        $this->loadModel("Package");
        if($this->data){
            $point_detail = $this->BuyPoint->findById($this->data["BuyPoint"]["id"]);
            if($point_detail){
                $package["Package"]["id"] = "";
                $package["Package"]["user_id"] = AuthComponent::user("id");
                $package["Package"]["buy_point_id"] = $point_detail["BuyPoint"]["id"];
                $package["Package"]["name"] = $point_detail["BuyPoint"]["no_of_point"]." Points";
                $package["Package"]["price"] = $point_detail["BuyPoint"]["price"];
                $package["Package"]["description"] = $point_detail["BuyPoint"]["no_of_point"]." Points in $".$point_detail["BuyPoint"]["price"];
                
                if($this->Package->save($package)){
                    $package_id = $this->Package->getLastInsertID();
                    $this->redirect(array("controller"=>"Payments","action"=>"payForPackage/".base64_encode($package_id)));
                }
                
                
            } else {
                $this->redirect(array("controller"=>"Users","action"=>"viewProfile"));
            }
        } else {
            $this->redirect(array("controller"=>"Users","action"=>"viewProfile"));
        }
    }
}

?> 