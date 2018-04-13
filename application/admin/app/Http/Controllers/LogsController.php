<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Entities\Categorie;

class LogsController extends Controller {

    private $logInitiates = array();
    private $logCollecteds = array();
    private $logCollectedEditeds = array();

    public function __construct() {
        parent::__construct();
        $this->logInitiates = $this->setActivity();
    }

    protected function showDetailLogs($id, $type) {
        // Collecting Subject Information
        $this->logCollected = Activity::where([
                    ['subject_id', '=', $id],
                    ['log_name', '=', $type]
                ])->orderByDesc('updated_at')->get();

        // Make data better for view, 
        foreach ($this->logCollected as $logValueEdit) {

            // Get name of causer
            $getCauserModel = object_get($logValueEdit, 'causer_type');
            $getCauserModel_id = object_get($logValueEdit, 'causer_id');
            $getCauserModelUsername = object_get($getCauserModel::find($getCauserModel_id), 'username');

            //Get time
            $getTime = object_get($logValueEdit, 'updated_at');
            $getTime = \Carbon\Carbon::parse($getTime)->format('d-m-Y , H:m:s');

            // Serve changes with beauty reading
            $getDetail = json_decode(object_get($logValueEdit, 'properties'));

            //Convert Object From json_decode to array
            $beforeDetail = $this->objectToArray(object_get($getDetail, 'old'));
            $afterDetail = $this->objectToArray(object_get($getDetail, 'attributes'));

            $this->logCollectedEdited[] = [
                'causerUsername' => $getCauserModelUsername,
                'time' => $getTime,
                'beforeDetail' => $beforeDetail,
                'afterDetail' => $afterDetail
            ];
        }

        // Collecting unique data
        $loggedActivityUniq = $this->logCollected->unique('subject_id');
        $loggedActivityUniq = array_get($loggedActivityUniq, 0);

        // Get Type
        $getSubjectType = explode('\\', object_get($loggedActivityUniq, 'subject_type'));

        // Get name of subject indent
        $getSubjectModel = object_get($loggedActivityUniq, 'subject_type');
        $getSubjectModel_id = object_get($loggedActivityUniq, 'subject_id');
        $getSubjectModelData = $getSubjectModel::withTrashed()->find($getSubjectModel_id);
        $getSubjectModelName = object_get($getSubjectModelData, 'name');


        return view('logs.showDetailLog', array(
            'logCollectedEdited' => $this->logCollectedEdited,
            'type' => $getSubjectType,
            'name' => $getSubjectModelName,
            'title' => 'Updated Logs')
        );
    }

    protected function showDetailLogsDeleted($id) {
        // Collecting Subject Information
        $this->logCollected = Activity::where([
                    ['id', '=', $id]
                ])->get();

        // Make data better for view, 
        // Get name of causer
        foreach ($this->logCollected as $value) {

            $getCauserModel = object_get($value, 'causer_type');
            $getCauserModel_id = object_get($value, 'causer_id');
            $getCauserModelUsername = object_get($getCauserModel::find($getCauserModel_id), 'username');

            //Get time
            $getTime = object_get($value, 'updated_at');
            $getTime = \Carbon\Carbon::parse($getTime)->format('d-m-Y , H:m:s');

            // Serve changes with beauty reading
            $getDetail = json_decode(object_get($value, 'properties'));

            //Convert Object From json_decode to array
            $beforeDetail = $this->objectToArray(object_get($getDetail, 'old'));
            $afterDetail = $this->objectToArray(object_get($getDetail, 'attributes'));

            $this->logCollectedEdited[] = [
                'causerUsername' => $getCauserModelUsername,
                'time' => $getTime,
                'beforeDetail' => $beforeDetail,
                'afterDetail' => $afterDetail
            ];
        }

        // Collecting unique data
        $loggedActivityUniq = $this->logCollected->unique('subject_id');
        $loggedActivityUniq = array_get($loggedActivityUniq, 0);

        // Get Type
        $getSubjectType = explode('\\', object_get($loggedActivityUniq, 'subject_type'));

        // Get name of subject indent
        $getSubjectModel = object_get($loggedActivityUniq, 'subject_type');
        $getSubjectModel_id = object_get($loggedActivityUniq, 'subject_id');
        $getSubjectModelData = $getSubjectModel::withTrashed()->find($getSubjectModel_id);
        $getSubjectModelName = object_get($getSubjectModelData, 'name');


        return view('logs.showDetailLogDeleted', array(
            'logCollectedEdited' => $this->logCollectedEdited,
            'type' => $getSubjectType,
            'name' => $getSubjectModelName,
            'title' => 'Deleted Logs')
        );
    }

    protected function showDetailLogsRestored($id) {
        // Collecting Subject Information
        $this->logCollected = Activity::where([
                    ['id', '=', $id]
                ])->get();

        // Make data better for view, 
        // Get name of causer
        foreach ($this->logCollected as $value) {

            $getCauserModel = object_get($value, 'causer_type');
            $getCauserModel_id = object_get($value, 'causer_id');
            $getCauserModelUsername = object_get($getCauserModel::find($getCauserModel_id), 'username');

            //Get time
            $getTime = object_get($value, 'updated_at');
            $getTime = \Carbon\Carbon::parse($getTime)->format('d-m-Y , H:m:s');

            // Serve changes with beauty reading
            $getDetail = json_decode(object_get($value, 'properties'));

            //Convert Object From json_decode to array
            $beforeDetail = $this->objectToArray(object_get($getDetail, 'old'));
            $afterDetail = $this->objectToArray(object_get($getDetail, 'attributes'));

            $this->logCollectedEdited[] = [
                'causerUsername' => $getCauserModelUsername,
                'time' => $getTime,
                'beforeDetail' => $beforeDetail,
                'afterDetail' => $afterDetail
            ];
        }

        // Collecting unique data
        $loggedActivityUniq = $this->logCollected->unique('subject_id');
        $loggedActivityUniq = array_get($loggedActivityUniq, 0);

        // Get Type
        $getSubjectType = explode('\\', object_get($loggedActivityUniq, 'subject_type'));

        // Get name of subject indent
        $getSubjectModel = object_get($loggedActivityUniq, 'subject_type');
        $getSubjectModel_id = object_get($loggedActivityUniq, 'subject_id');
        $getSubjectModelData = $getSubjectModel::withTrashed()->find($getSubjectModel_id);
        $getSubjectModelName = object_get($getSubjectModelData, 'name');

        return view('logs.showDetailLogRestored', array(
            'logCollectedEdited' => $this->logCollectedEdited,
            'type' => $getSubjectType,
            'name' => $getSubjectModelName,
            'title' => 'Restored Logs')
        );
    }

    protected function showDetailLogsCreated($id) {
        // Collecting Subject Information
        $this->logCollected = Activity::where([
                    ['id', '=', $id]
                ])->get();

        // Make data better for view, 
        // Get name of causer
        foreach ($this->logCollected as $value) {

            $getCauserModel = object_get($value, 'causer_type');
            $getCauserModel_id = object_get($value, 'causer_id');
            $getCauserModelUsername = object_get($getCauserModel::find($getCauserModel_id), 'username');

            //Get time
            $getTime = object_get($value, 'updated_at');
            $getTime = \Carbon\Carbon::parse($getTime)->format('d-m-Y , H:m:s');

            // Serve changes with beauty reading
            $getDetail = json_decode(object_get($value, 'properties'));

            //Convert Object From json_decode to array
            $beforeDetail = $this->objectToArray(object_get($getDetail, 'old'));
            $afterDetail = $this->objectToArray(object_get($getDetail, 'attributes'));

            $this->logCollectedEdited[] = [
                'causerUsername' => $getCauserModelUsername,
                'time' => $getTime,
                'beforeDetail' => $beforeDetail,
                'afterDetail' => $afterDetail
            ];
        }

        // Collecting unique data
        $loggedActivityUniq = $this->logCollected->unique('subject_id');
        $loggedActivityUniq = array_get($loggedActivityUniq, 0);

        // Get Type
        $getSubjectType = explode('\\', object_get($loggedActivityUniq, 'subject_type'));

        // Get name of subject indent
        $getSubjectModel = object_get($loggedActivityUniq, 'subject_type');
        $getSubjectModel_id = object_get($loggedActivityUniq, 'subject_id');
        $getSubjectModelData = $getSubjectModel::withTrashed()->find($getSubjectModel_id);
        $getSubjectModelName = object_get($getSubjectModelData, 'name');

        return view('logs.showDetailLogCreated', array(
            'logCollectedEdited' => $this->logCollectedEdited,
            'type' => $getSubjectType,
            'name' => $getSubjectModelName,
            'title' => 'Created Logs')
        );
    }

    protected function logUpdated() {

        // Fillter for update, 
        // if you want to see result this behavior types dd($this->logCollected) in end of function
        $this->logInitiates = $this->setActivity('subject_id');

        $this->filterLogs('updated', $this->logInitiates);

        // Make data better for view, 
        // if you want to see result this behavior types dd($this->logCollectedEdited) in end of function
        foreach ($this->logCollecteds as $logValueEdit) {

            $id = object_get($logValueEdit, 'subject_id');
            $subjectType = $this->getSubjectType($logValueEdit);
            $subjectModel = object_get($logValueEdit, 'subject_type');
            $subjectModel_id = object_get($logValueEdit, 'subject_id');
            $subjectModelData = $subjectModel::withTrashed()->find($subjectModel_id);
            $subjectModelName = object_get($subjectModelData, 'name');

            $causerModel = object_get($logValueEdit, 'causer_type');
            $causerModel_id = object_get($logValueEdit, 'causer_id');
            $causerModelUsername = object_get($causerModel::find($causerModel_id), 'username');
            $detail = object_get($logValueEdit, 'properties');
            $time = object_get($logValueEdit, 'updated_at');
            $log_name = object_get($logValueEdit, 'log_name');

            $this->logCollectedEditeds[] = [
                'id' => $id,
                'type' => $subjectType,
                'subjectName' => $subjectModelName,
                'causerUsernmae' => $causerModelUsername,
                'time' => \Carbon\Carbon::parse($time)->format('d-m-Y , H:m:s'),
                'log_name' => $log_name
            ];
        }

        return view('logs.updated', array(
            'logsCollected' => $this->logCollectedEditeds,
            'listNomor' => 1,
            'title' => 'Updated Logs')
        );
    }

    protected function logRestored() {

        // Fillter for update, 
        // if you want to see result this behavior types dd($this->logCollected) in end of function
        $this->logInitiates = $this->setActivity('subject_id');

        $this->filterLogs('restored', $this->logInitiates);

        // Make data better for view, 
        // if you want to see result this behavior types dd($this->logCollectedEdited) in end of function
        foreach ($this->logCollecteds as $logValueEdit) {

            $id = object_get($logValueEdit, 'id');
            $subjectType = $this->getSubjectType($logValueEdit);
            $ModelProperties = object_get($logValueEdit, 'properties');
            $subjectName = object_get(json_decode($ModelProperties)->attributes, 'name');

            $causerModel = $this->getRetunModel($logValueEdit);
            $causerModelUsername = object_get($causerModel, 'username');
            $time = object_get($logValueEdit, 'updated_at');


            $this->logCollectedEditeds[] = [
                'id' => $id,
                'type' => $subjectType,
                'subjectName' => $subjectName,
                'causerUsernmae' => $causerModelUsername,
                'time' => \Carbon\Carbon::parse($time)->format('d-m-Y , H:m:s')
            ];
        }

        return view('logs.restored', array(
            'logsCollected' => $this->logCollectedEditeds,
            'listNomor' => 1,
            'title' => 'Restored Logs')
        );
    }

    protected function logDeleted() {

        // Fillter for update, 
        // if you want to see result this behavior types dd($this->logCollected) in end of function
        $this->filterLogs('deleted', $this->logInitiates);
        // Make data better for view, 
        // if you want to see result this behavior types dd($this->logCollectedEdited) in end of function
        foreach ($this->logCollecteds as $logValueEdit) {

            $id = object_get($logValueEdit, 'id');
            $subjectType = $this->getSubjectType($logValueEdit);
            $getModelProperties = object_get($logValueEdit, 'properties');
            $subjectTypeName = object_get(json_decode($getModelProperties)->attributes, 'name');

            $CauserModel = $this->getRetunModel($logValueEdit);
            $causerModelUsername = object_get($CauserModel, 'username');

            $time = object_get($logValueEdit, 'updated_at');

            $this->logCollectedEditeds[] = [
                'id' => $id,
                'type' => $subjectType,
                'subjectName' => $subjectTypeName,
                'causerUsernmae' => $causerModelUsername,
                'time' => \Carbon\Carbon::parse($time)->format('d-m-Y , H:m:s')
            ];
        }

        return view('logs.deleted', array(
            'logsCollected' => $this->logCollectedEditeds,
            'listNomor' => 1,
            'title' => 'Deleted Logs')
        );
    }

    protected function logCreated() {

        // Fillter for update, 
        // if you want to see result this behavior types dd($this->logCollected) in end of function
        $this->filterLogs('created', $this->logInitiates);

        // Make data better for view, 
        // if you want to see result this behavior types dd($this->logCollectedEdited) in end of function
        foreach ($this->logCollecteds as $logValueEdit) {

            $id = object_get($logValueEdit, 'id');
            $subjectType = $this->getSubjectType($logValueEdit);
            $getModelProperties = object_get($logValueEdit, 'properties');
            $subjectTypeName = object_get(json_decode($getModelProperties)->attributes, 'name');

            $CauserModel = $this->getRetunModel($logValueEdit);
            $causerModelUsername = object_get($CauserModel, 'username');

            $time = object_get($logValueEdit, 'updated_at');

            $this->logCollectedEditeds[] = [
                'id' => $id,
                'type' => $subjectType,
                'subjectName' => $subjectTypeName,
                'causerUsernmae' => $causerModelUsername,
                'time' => \Carbon\Carbon::parse($time)->format('d-m-Y , H:m:s')
            ];
        }

        return view('logs.created', array(
            'logsCollected' => $this->logCollectedEditeds,
            'listNomor' => 1,
            'title' => 'Created Logs')
        );
    }

    protected function filterLogs($param = NULL, $value = NULL) {
        foreach ($value as $logValue) {
            if (object_get($logValue, 'description') == $param) {
                $this->logCollecteds[] = $logValue;
            }
        }
    }

    protected function setActivity($usingUnique = NULL) {
        return Activity::all()->sortByDesc('updated_at')->unique($usingUnique);
    }

    protected function getSubjectType($logValueEdit = NULL) {
        return array_last(explode('\\', object_get($logValueEdit, 'subject_type')));
    }

    protected function getRetunModel($logValueEdit = NULL) {
        $getCauserModel = object_get($logValueEdit, 'causer_type');
        $getCauserModel_id = object_get($logValueEdit, 'causer_id');
        return $getCauserModel::find($getCauserModel_id);
    }

}
