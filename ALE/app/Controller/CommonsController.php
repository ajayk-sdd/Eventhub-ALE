<?php
App::uses('AppController', 'Controller');
class CommonsController extends AppController
{
	public $name = 'Commons';
	var $components = array();
	public $uses = array();
	
	/** @Created:     30-April-2014
	* @Method :     beforeFilter
	* @Author:      Sachin Thakur
	* @Modified :   ---
	* @Purpose:     Rendered before any function
	* @Param:       none
	* @Return:      none
	*/
	function beforeFilter() {
		parent::beforeFilter();
	}
	 /**
  	* @Created:     30-April-2014
	* @Method :     admin_changestatus
	* @Author: 	Sachin Thakur
	* @Modified :	
	* @Purpose:   	Function for changing status of cms 
	* @Param:     	$id,$status,$model
	* @Return:    	none
	*/ 
    function admin_changestatus($id=NULL, $status=NULL,$model=NULL) {
         $this->layout = "ajax";
         $this->autoRender = false;
         $this->loadModel($model);
         $id = base64_decode($id);
	
         $this->$model->id = $id;
	 
         if($status == 0){
            $this->$model->saveField('status', 1);
            echo 1;
         }else{
            $this->$model->saveField('status', 0);
            echo 0;
         }
    }
    
    /** @Created:    29-April-2014
     * @Method :     admin_select_multiple
     * @Author:      Prateek Jadhav
     * @Modified :   Sachin Thakur
     * @Purpose:     operation with multiple select
     * @Param:       none
     * @Return:      none
     */
    public function admin_selectMultiple() {
        $this->layout = false;
        $this->autoRender = false;
        if ($this->data) {
            $model = $this->params->query['model'];
            $this->loadModel($model);
            if (isset($this->data['activate'])) {
                $this->$model->updateAll(array($model.'.status' => 1), array($model.'.id' => $this->data['IDs']));
                $this->Session->setFlash('Selected status has been activated.', 'default', array('class' => 'green'));
            } else if (isset($this->data['deactivate'])) {
                $this->$model->updateAll(array($model.'.status' => 0), array($model.'.id' => $this->data['IDs']));
                $this->Session->setFlash('Selected status has been deactivated.', 'default', array('class' => 'green'));
            } else if (isset($this->data['delete'])) {
                $this->$model->deleteAll(array($model.'.id' => $this->data['IDs']));
                $this->Session->setFlash('Deleted Successfully.', 'default', array('class' => 'green'));
            }
        }
        $this->redirect($this->referer());
    }
    /** @Created:    29-April-2014
     * @Method :     admin_delete
     * @Author:      Sachin Thakur
     * @Modified :  
     * @Purpose:     Common Delete Function
     * @Param:       $id,$model
     * @Return:      none
     */
    public function admin_Delete($id = NULL,$model = NULL) {
        $this->layout = false;
        $this->autoRender = false;
	$this->loadModel($model);
        $id = base64_decode($id);
	if ($this->$model->delete($id)) {
            $this->Session->setFlash('Successfully deleted', 'default', array('class' => 'green'));
        } else {
            $this->Session->setFlash('Unable to delete, try again', 'default', array('class' => 'red'));        
        }
	$this->redirect($this->referer());
    }
    
   	
}
?>