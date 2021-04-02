<?php

namespace MercerMorning\Api;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class IlpService
{
    private $client;
    private $method;

    public function __construct()
    {
        config('apiLpr.crm_base_url');
        $this->client = new Client(['base_uri' => config('apiLpr.crm_base_url'),
            'auth' => [config('apiLpr.crm_username'), config('apiLpr.crm_password')],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Регистрация пользователя
     * @param array $params
     * @return stdClass object
     */
    public function RegisterParticipant($params){
        $action = 'RegisterParticipant';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Регистрация LPR
     * @param array $params
     * @return stdClass object
     */
    public function RegisterLPR($params){
        $action = 'RegisterLPR';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Получение данных пользователя типа LPR
     * @param array $params
     * @return stdClass object
     */
    public function SearchLPRData($params){
        $action = 'SearchLPRData';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Отправка кода подтверждения емайл
     * @param array $params
     * @return stdClass object
     */
    public function EmailActivationLinkSend($params){
        $action = 'EmailActivationLinkSend';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Обновление данных пользователя
     * @param array $params
     * @return stdClass object
     */
    public function UpdateParticipant($params){
        $action = 'UpdateParticipant';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Обновление данных пользователя
     * @param array $params
     * @return stdClass object
     */
    public function UpdateLPR($params){
        $action = 'UpdateLPR';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * данные пользователя
     * @param array $data
     * @return stdClass object
     */
    public function SearchParticipantsData($params){
        $action = 'SearchParticipantsData';

        $request = $this->makeRequest($action, $params );

        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * данные о должностях
     * @param array $params
     * @return stdClass object
     */
    public function SearchEmployeerPositionsData($params){
        $action = 'SearchEmployeerPositionsData';

        $request = $this->makeRequest($action, $params );

        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * данные клиентов
     * @param array $search
     * @return stdClass object
     */
    public function SearchConsumerData($params){
        $action = 'SearchConsumerData';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * данные баланса клиента
     * @param array $params
     * @return stdClass object
     */
    public function GetCreditsTotal($params){
        $action = 'GetCreditsTotal';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * история операций
     * @param array $params
     * @return stdClass object
     */
    public function GetCreditsDetails($params){
        $action = 'GetCreditsDetails';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * история продаж LPR
     * @param array $params
     * @return stdClass object
     */
    public function GetManagerSales($params){
        $action = 'GetManagerSales';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * история продаж Продавца
     * @param array $params
     * @return stdClass object
     */
    public function GetParticipantSales($params){
        $action = 'GetParticipantSales';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Обращение в горячую линию
     * @param array $params
     * @return stdClass object
     */
    public function RegisterTicket($params){
        $action = 'RegisterTicket';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Операция Загрузки qr
     * @param array $search
     * @return stdClass object
     */
    public function UploadQR($params){
        $action = 'UploadQR';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Регистрация продажи (чек)
     * @param array $search
     * @return stdClass object
     */
    public function RegisterReceipt($params){
        $action = 'RegisterReceipt';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Информация о чеке по id
     * @param array $search
     * @return stdClass object
     */
    public function SearchReceiptsData($params){
        $action = 'SearchReceiptsData';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Регистрация продажи (Товары)
     * @param array $search
     * @return stdClass object
     */
    public function UpdateReceipts($params){
        $action = 'UpdateReceipts';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Регистрация продажи (Товары)
     * @param array $search
     * @return stdClass object
     */
    public function UpdateSales($params){
        $action = 'UpdateSales';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Регистрация продажи (Товары)
     * @param array $search
     * @return stdClass object
     */
    public function RegisterSale($params){
        $action = 'RegisterSale';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Получение списка товаров
     * @param array $params
     * @return stdClass object
     */
    public function GetProductList($params){
        if(Cache::has('product_list')){
            $data=Cache::get('product_list'.$this->id);
            if(!empty($data)){
                return $data;
            }
        }
        $action = 'GetProductList';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        $this->save_cache('product_list'.$this->id, $data,1800);
        return $data;
    }

    /**
     * Получение списка призов
     * @param array $params
     * @return stdClass object
     */
    public function SearchPrizesData($params){

        $action = 'SearchPrizesData';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * покупка приза
     * @param array $params
     * @return stdClass object
     */
    public function OrderPrize($params){
        $action = 'OrderPrize';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Получение списка ТТ Избранных и привязанных
     * @param array $params
     * @return stdClass object
     */
    public function SearchStoresLinks($params){
        $action = 'SearchStoresLinks';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }

    /**
     * Операция списания\начисления
     * @param array $params
     * @return stdClass object
     */
    public function AddCreditsOperation($params){
        $action = 'AddCreditsOperation';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * зарегистрировать чек к начислению
     * @param array $params
     * @return stdClass object
     */
    public function AddFileToCreditsOperation($params){
        $action = 'AddFileToCreditsOperation';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * получить сведения о магазинах(ТТ)
     * @param array $params
     * @return stdClass object
     */
    public function SearchStoresData($params){
        $action = 'SearchStoresData';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * получить сведения о магазинах(ТТ)
     * @param array $params
     * @return stdClass object
     */
    public function GetShops($params){
        $action = 'GetShops';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }

    /**
     * Связать ТТ с ЛПР
     * @param array $params
     * @return stdClass object
     */
    public function UpdateLinkStoreWithLPR($params){
        $action = 'UpdateLinkStoreWithLPR';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * получить сведения о магазинах(ТТ)
     * @param array $params
     * @return stdClass object
     */
    public function UpdateLinkStoreWithParticipant($params){
        $action = 'UpdateLinkStoreWithParticipant';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Получить список пользователей по INN
     * @param array $params
     * @return stdClass object
     */
    public function SearchSalesReps($params){
        $action = 'SearchSalesReps';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Получить список пользователей по INN
     * @param array $params
     * @return stdClass object
     */
    public function SearchLPRbyINN($params){
        $action = 'SearchLPRbyINN';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Получить список пользователей по INN
     * @param array $params
     * @return stdClass object
     */
    public function SearchLegalEntities($params){
        $action = 'SearchLegalEntities';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Получить список целей пользователя
     * @param array $params
     * @return stdClass object
     */
    public function GetManagerGoals($params){
        $action = 'GetManagerGoals';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Получить историю заказа призов
     * @param array $params
     * @return stdClass object
     */
    public function GetOrderprizesData($params){
        $action = 'GetOrderprizesData';
        $request = $this->makeRequest($action, $params);
        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);
        return $data;
    }
    /**
     * Отправка кода по телефону
     * @params array $params
     * @return stdClass object
     */
    public function SendAuthMobilephoneCode($params){
        $action = 'SendAuthMobilephoneCode';
        $request = $this->makeRequest($action, $params );
        $response=$this->download($request);
        Cache::put('mobile_minute_'.$params['mobilephone'],1,60);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Проверка отправленого по телефону кода
     * @params array $params
     * @return stdClass object
     */
    public function VerifyAuthMobilephoneCode($params){
        $action = 'VerifyAuthMobilephoneCode';

        $request = $this->makeRequest($action, $params );

        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }
    /**
     * Отправка ссылки восстановления пароля
     * @params array $params
     * @return stdClass object
     */
    public function EmailRecoveryLinkSend($params){
        $action = 'EmailRecoveryLinkSend';

        $request = $this->makeRequest($action, $params );

        $response=$this->download($request);
        $data=$this->getParsedData(json_decode($response),$action);

        return $data;
    }

    public function getParsedData($response,$action){

        try{
            return $response->response->{$action};
        }catch (\Exception $e){
            abort(403, 'Ошибка соединения с CRM');
            //abort(response()->json(['status'=>false,'error' => ['msg'=>'Ошибка соединения с CRM']], 400));
        }

    }

    /**
     * Создаем запрос.
     * @param string $action тип запроса
     * @param array $params массив параметров
     */
    private function makeRequest($action, $params){
        $array = array('request'=>array(
            'code'=>	config('apiLpr.crm_code'),
            'action'	=>	'api/'.$action,
            'params'	=>	$params,

        ));
        $this->method='POST';

        $json = json_encode($array);
        return $json;
    }

    private function download($data,$false_log=0,$json=true)
    {
        $start = explode(" ",microtime());
        $response = $this->client->request($this->method, '/', ['body' => $data]);
        $finish = explode(" ",microtime());
        $result = $response->getBody()->getContents();

        $dataLog =
            date("Y-m-d H:i:s")."
            EXECUTE_TIME: ".(($finish[1]-$start[1]) + ($finish[0]-$start[0]))." sec
            SCRIPT_FILENAME:".$_SERVER["SCRIPT_FILENAME"]."
            REQUEST_URI: ".$_SERVER["REQUEST_URI"]."
            METHOD: ".$this->method."
            URL: ". env('CRM_URL') ."
            DATA: ". $data."
            RESULT: ". $result;
        \Log::channel('guzzle')->info($dataLog);

        return $result;
    }
}
