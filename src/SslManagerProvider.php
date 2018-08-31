<?php

namespace Ephenodrom;

use Illuminate\Support\Facades\Log;
use Ephenodrom\Exceptions\RestExecutionException;
use Illuminate\Support\Facades\Cache;

/**
 *
 * @author Daniel Linsenmeier <daniel@ephenodrom.de>
 * @copyright 2018 Daniel Linsenmeier
 *
 */
class SslManagerProvider {

    /**
     * The url of the api server
     */
    private $url;

    /**
     * The username for the api
     */
    private $user;

    /**
     * The password for the api user
     */
    private $password;

    /**
     * The context of the api user
     */
    private $context;

    /**
     * The session token for the current user session
     */
    private $sessionToken;

    /**
     * Create a new class instance.
     *
     * @param  $apiKey
     * @return void
     */
    public function __construct($url, $user, $context, $password) {
        $this->url = $url;
        $this->user = $user;
        $this->context = $context;
        $this->password = $password;
        $this->sessionTimeout = 10;
    }

    /**
     * Creates a new contact for use in a certificate.
     *
     * @param $contact
     * @param $demo
     * @return array
     */
    public function sslContactCreate($contact, $demo = false, $parameter = null) {
        try{
            $json = json_encode($contact);
            $response = $this->send("/sslcontact", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not create contact.");
            throw $e;
        }
    }

    /**
     * Update the information in an existing contact.
     *
     * @param $id
     * @param $contact
     * @param $demo
     * @return array
     */
    public function sslContactUpdate($id, $contact, $demo = false, $parameter = null) {
        try{
            $json = json_encode($contact);
            $response = $this->send("/sslcontact/$id", "PUT", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not update contact.");
            throw $e;
        }
    }

    /**
     * Delete an existing contact.
     *
     * @param $id
     * @param $demo
     * @return array
     */
    public function sslContactDelete($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/sslcontact/".$id, "DELETE", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not delete contact with id $id.");
            throw $e;
        }
    }

    /**
     * Displays the information contained in an existing contact.
     *
     * @param  $id
     * @param $demo
     * @return array
     */
    public function sslContactInfo($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/sslcontact/".$id, "GET", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not find contact with id $id.");
            throw $e;
        }
    }

    /**
     * Display the details of one or more existing contacts. The result can be narrowed down with different keywords.
     *
     * @param $view
     * @param $where
     * @param $order
     * @return array
     */
    public function sslContactList($view = null, $filters = null, $order = null, $demo = false, $parameter = null) {
        try{
            $ar = [
                'view' => $view,
                'filters' => $filters,
                'order' => $order
            ];
            $json = json_encode($ar);
            $response = $this->send("/sslcontact/_search", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not create contact.");
            throw $e;
        }
    }

    /**
     * The CertificateCreate task initiates the order of a certificate. If the request is successfully accepted by the system, a new job is
     * created which initiates the order of the certificate. As an answer, the ID of the created job is returned.
     *
     * @param $data
     * @param $demo
     * @return array
     */
    public function certificateCreate($data, $demo = false, $parameter = null) {
        try{
            $json = json_encode($data);
            $response = $this->send("/certificate", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not create certificate.");
            throw $e;
        }
    }

    /**
     * The CertificateReissue task allows you to change the CSR key of an existing certificate. If the request is successfully accepted by the
     * system, a new job is created which initiates the reissue of the certificate. As a response, the ID of the created job is returned.
     *
     * @param $id
     * @param $certificate
     * @param $demo
     * @return array
     */
    public function certificateReissue($id, $data, $demo = false, $parameter = null) {
        try{
            $json = json_encode($data);
            $response = $this->send("/certificate/".$id, "PUT", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not reissue certificate with id $id.");
            throw $e;
        }
    }

    /**
     * The CertificateDelete task allows you to initiate the deletion process for a certificate. If the request is successfully accepted by the
     * system, a new job is created which initiates the deletion of the certificate. As an answer, the ID of the created job is returned.
     *
     * @param $id
     * @param $certificate
     * @param $demo
     * @return array
     */
    public function certificateDelete($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/certificate/".$id, "DELETE", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not delete certificate with id $id.");
            throw $e;
        }
    }

    /**
     * The CertificateInfo task combined with a valid certificate ID will return the contacts used in the certificate as well as all information
     * related to the certificate.
     *
     * @param $id
     * @param $demo
     * @return array
     */
    public function certificateInfo($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/certificate/".$id, "GET", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not request certificate data with id $id.");
            throw $e;
        }
    }

    /**
     * The CertificateList task allows you to display the information contained in one or more certificates. The result may be narrowed down by
     * using keywords.
     *
     * @param $view
     * @param $where
     * @param $order
     * @return array
     */
    public function certificateList($view = null, $filters = null, $order = null, $demo = null, $parameter = null) {
        try{
            $ar = [
                'view' => $view,
                'filters' => $filters,
                'order' => $order
            ];
            $json = json_encode($ar);
            $response = $this->send("/certificate/_search", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not list certificates.");
            throw $e;
        }
    }

    /**
     * The CertificateRenew task extends the term of the existing certificate. If the system successfully accepts the request, a new job is
     * created which extends the term of the certificate. As a response, the ID of the created job is returned.
     *
     * @param $id
     * @param $data
     * @param $demo
     * @return array
     */
    public function certificateRenew($id, $data, $demo = false, $parameter = null) {
        try{
            $json = json_encode($data);
            $response = $this->send("/certificate/$id/renew", "PUT", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not renew certificate with id $id.");
            throw $e;
        }
    }

    /**
     * This CertificateRevoke task allows you to revoke an existing certificate with a specific serial number. This is useful when a reissue was
     * initiated and you intend to declare the old serial numbers as invalid. In this case initiate a revoke for the domain and the old serial
     * number.
     *
     * @param $id
     * @param $data
     * @param $demo
     * @return array
     */
    public function certificateRevoke($id, $data, $demo = false, $parameter = null) {
        try{
            $json = json_encode($data);
            $response = $this->send("/certificate/$id/revoke", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not revoke certificate with id $id.");
            throw $e;
        }
    }

    /**
     * The CertificatePrepareOrder task checks the CSR and generates the authentication data. The check consists of analysing the bit-length
     * of the CSR key, checking the formatting and if the CSR key can be processed. After a successful validation the authentication data is
     * generated based on the chosen product. If the task was successful, the CSR key, the single components of the CSR key and the generated
     * authentication data is returned.
     *
     * @param $data
     * @param $demo
     * @return array
     */
    public function certificatePrepareOrder($data, $demo = false, $parameter = null) {
        try{
            $json = json_encode($data);
            $response = $this->send("/certificate/prepareOrder", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not prepare order.");
            throw $e;
        }
    }

    /**
     * The CertificateCommentUpdate task updates the comment of a certificate.
     *
     * @param $id
     * @param $certificate
     * @return array
     */
    public function certificateCommentUpdate($id, $certificate, $demo = false, $parameter = null) {
        try{
            $json = json_encode($certificate);
            $response = $this->send("/certificate/$id/comment", "PUT", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not update comment for certificate with id $id.");
            throw $e;
        }
    }

    /**
     * The JobInfo task displays the information of a running job.
     *
     * @param $id
     * @return array
     */
    public function jobInfo($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/job/".$id, "GET", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("CertificateJobInfo failed.");
            throw $e;
        }
    }

    /**
     * The CertificateJobList task allows you to display the information contained in one or more certificate jobs. The result may be narrowed
     * down by using keywords.
     *
     * @param $view
     * @param $where
     * @param $order
     * @return array
     */
    public function jobList($view = null, $filters = null, $order = null, $demo = false, $parameter = null) {
        try{
            $ar = [
                'view' => $view,
                'filters' => $filters,
                'order' => $order
            ];
            $json = json_encode($ar);
            $response = $this->send("/job/_search", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not list certificate jobs.");
            throw $e;
        }
    }

    /**
     * The JobCancel task cancels a running job.
     *
     * @param $id
     * @return array
     */
    public function jobCancel($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/job/$id/cancel", "PUT", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not cancel the certificate job.");
            throw $e;
        }
    }

    /**
     * The JobConfirm Task confirms a running job. It depends on the configuration of the user if a job needs to be confirmed.
     *
     * @param CertificateJob $job
     * @return array
     */
    public function jobConfirm($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/job/$id/confirm", "PUT", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not confirm the certificate job.");
            throw $e;
        }
    }

    /**
     * The JobReject Task rejects a running job.
     *
     * @param CertificateJob $job
     * @return array
     */
    public function jobReject($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/job/$id/reject", "PUT", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not reject the certificate job.");
            throw $e;
        }
    }

    /**
     * The JobHistoryInfo task displays the information of an already processed job.
     *
     * @param CertificateJob $job
     * @return array
     */
    public function jobHistoryInfo($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/job/history/$id", "GET", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not find certificate histoy job.");
            throw $e;
        }
    }

    /**
     * The CertificateHistoryJobList task allows you to display the historic information contained in one or more certificate jobs. The result
     * may be narrowed down by using keywords.
     *
     * @param $view
     * @param $where
     * @param $order
     * @return array
     */
    public function jobHistoryList($view = null, $where = null, $order = null, $demo = false, $parameter = null) {
        try{
            $ar = [
                'view' => $view,
                'where' => $where,
                'order' => $order
            ];
            $json = json_encode($ar);
            $response = $this->send("/job/history/_search", "POST", $json, $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not list certificate history jobs.");
            throw $e;
        }
    }

    /**
     * The PollInfo task, grabs the latest poll message for your user.
     *
     * @return array
     */
    public function pollInfo($demo = false, $parameter = null) {
        try{
            $response = $this->send("/poll", "GET", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("PollInfo failed.");
            throw $e;
        }
    }

    /**
     * The PollConfirm task confirms the message with the given id.
     *
     * @param $id
     * @return array
     */
    public function pollConfirm($id, $demo = false, $parameter = null) {
        try{
            $response = $this->send("/poll/".$id, "PUT", $demo, $parameter);
            return $response;
        }catch(RestExecutionException $e){
            Log::info("Could not confirm poll message with id $id.");
            throw $e;
        }
    }

    /**
     * Sends the request to the given path with the given method and body.
     * @param $path
     * @param $method
     * @param $body
     * @return array
     */
    private function send($path, $method, $body = null, $demo = null, $parameter =  null){
        $this->sessionToken = Cache::pull('SSL_MANAGER_SESSION_TOKEN');
        if($this->sessionToken == null){
            Log::info("No session token found, create one.");
            $this->authSessionCreate();
        }
         // Setup curl
        $finalUrl = $this->url.$path;
        if($parameter != null){
          if(is_array($parameter)){
            $first = true;
            foreach ($parameter as $p) {
              if($first){
                $finalUrl= $finalUrl."?";
                $first = false;
                $finalUrl= $finalUrl.$p['name']."=".$p['value'];
              }
              $finalUrl= $finalUrl."&".$p['name']."=".$p['value'];
            }
          }
        }
        $ch = curl_init($finalUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept : application/json',
            "X-Domainrobot-SessionId: $this->sessionToken"
        ));
        curl_setopt($ch,CURLOPT_USERAGENT,'LaravelSSLProvider');
        if($body != null){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }
        // Execute and close the curl
        $response = curl_exec($ch);

        curl_close($ch);
        $responseAsArray = json_decode($response, true);
        $stid = $responseAsArray['stid'];
        if($responseAsArray['status']['type'] == "SUCCESS"){
            // Everything looks fine, return the response
            Log::info("RestCall with stid $stid successfull");
            return $responseAsArray;
        }else{
            // Something went wrong, check for status notify or throw RestExecutionException
            if(array_key_exists("status", $responseAsArray)){
                $status = $responseAsArray['status'];
                if(array_key_exists("type", $status)){
                    if(strtolower($status['type']) == "notify"){
                        // We got a notify response from the system return the response
                         $stid = $responseAsArray['stid'];
                         Log::info("RestCall with stid $stid returns notify");
                        return $responseAsArray;
                    }
                }
            }
            $msg = null;
            $code = null;
            $obj = null;
            $stid = null;
            if(array_key_exists("messages", $responseAsArray)){
                $messages = $responseAsArray['messages'];
                if(!empty($messages)){
                    $message = $messages[0];
                    $msg = $message['text'];
                    $code = $message['messageCode'];
                    if(array_key_exists("objects", $message)){
                        $objects = $message['objects'];
                    }
                }
            }
            $obj = null;
            $stid = $responseAsArray['stid'];
            Log::info("RestCall with stid $stid NOT successfull");
            if(isset($objects[0]['value'])){
                $obj = $objects[0]['value'];
            }
            throw new RestExecutionException($msg, $code, $obj, $stid);
        }
    }

    /**
     * Creates a new session if none exists or if the old session has expired.
     */
    private function authSessionCreate(){
        Log::info("Create new authsession");
        $body = [
            "user" => $this->user,
            "password" => $this->password,
            "context" => $this->context
        ];
        $url = $this->url;
        $finalUrl = $this->url."/login?timeout=".$this->sessionTimeout;
        $ch = curl_init($finalUrl);
        $bodyAsArray = [
            "user" => $this->user,
            "password" => $this->password,
            "context" => $this->context
        ];
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($bodyAsArray));
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 1);
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept : application/json',
        ));
        curl_setopt($ch,CURLOPT_USERAGENT,'LaravelSSLProvider');
        if( !$data = curl_exec( $ch )) {
            Log::info("Curl execution error,". curl_error( $ch ));
            return false;
        }
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($data, 0, $header_size);
        $body = substr($data, $header_size);
        curl_close( $ch );
        $responseAsArray = json_decode($body, true);
        $stid = $responseAsArray['stid'];
        if($responseAsArray['status']['type'] == "SUCCESS"){
            $header=explode("\n",$header);
            $token = null;
            foreach($header as $line){
                if (strpos($line, 'Set-Cookie: domainrobot_session=') === 0) {
                    $token = substr($line, 32);
                    $token = substr($token, 0, strpos($token, ";"));
                    $this->sessionToken = $token;
                    Cache::put('SSL_MANAGER_SESSION_TOKEN', $token, $this->sessionTimeout-1);
                    return true;
                }
            }
            return false;
        }else{
            // Something went wrong, throw RestExecutionException
            $messages = $responseAsArray['messages'][0];
            $msg = $messages['text'];
            $code = $messages['messageCode'];
            $objects = $messages['objects'];
            $obj = null;
            $stid = $responseAsArray['stid'];
            Log::info("RestCall with stid $stid NOT successfull");
            if(isset($objects[0]['value'])){
                $obj = $objects[0]['value'];
            }
            throw new RestExecutionException($msg, $code, $obj, $stid);
        }
    }

}
