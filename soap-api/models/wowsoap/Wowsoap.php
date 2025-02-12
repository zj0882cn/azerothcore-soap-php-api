<?php
namespace app\models\wowsoap;

use SoapClient;
use SoapParam;
use SoapFault;

/**
 *  Wowsoap
 */
class Wowsoap
{
	
	public $soap_connection_info = array(
	  'soap_uri' => 'urn:AC',
	  'soap_host' => '43.128.84.239',
	  'soap_port' => '7878',
	  'account_name' => 'admin',
	  'account_password' => 'abcd12'
	);

	public function RemoteCommandWithSOAP($username, $password, $COMMAND)
	{
		$soap_connection_info = $this->soap_connection_info;
		$result = '';

		try {
			$conn = new SoapClient(NULL, array(
				'location' => 'http://' . $soap_connection_info['soap_host'] . ':' . $soap_connection_info['soap_port'] . '/',
				'uri' => $soap_connection_info['soap_uri'],
				'style' => SOAP_RPC,
				'login' => $username,
				'password' => $password
			));
			$result = $conn->executeCommand(new SoapParam($COMMAND, 'command'));
			unset($conn);
		} catch (SoapFault $e) {

			$result = $e;
			echo "<pre>";var_dump($result);echo "</pre>";exit;
		}
			
		//echo "<pre>";var_dump($result);echo "</pre>";exit;

		return $result;
	}

    public function serverinfo1()
    {	
	}

    public function serverinfo()
    {	
		$COMMAND =".server info";
		$str = $this->RemoteCommandWithSOAP(
			$this->soap_connection_info['account_name'],
			$this->soap_connection_info['account_password'],
			$COMMAND);

		$str= explode("\r\n", $str);
		$str0 = explode(" ", $str[0]);
		$str1 = explode(":", $str[1]);
		$str2 = explode(":", $str[2]);
		$str3 = explode(":", $str[3]);
		$str4 = explode(":", $str[4]);
		$str5 = explode(":", $str[5]);
		$str6 = explode(":", $str[6]);
		 
		 $result[] = ["info"=>$str0];
		 $result[] = [$str1[0]=>$str1[1]];
		 $result[] = [$str2[0]=>$str2[1]];
		 $result[] = [$str3[0]=>$str3[1]];
		 $result[] = [$str4[0]=>$str4[1]];
		 $result[] = [$str5[0]=>$str5[1]];
		 $result[] = [$str6[0]=>$str6[1]];
		 
	//echo "<pre>";var_dump($result);echo "</pre>";exit;
		return $result;
    }

    public function acountlist()
    {	
		$COMMAND ="account onlinelist";
		
		$str = $this->RemoteCommandWithSOAP(
			$this->soap_connection_info['account_name'],
			$this->soap_connection_info['account_password'],
			$COMMAND);
		$str= explode("\r\n", $str);
		$result = $str;
		return $result;
		return $result;
    }

    public function help()
    {	
 		$COMMAND ="help";
		
		$result = $this->RemoteCommandWithSOAP(
			$this->soap_connection_info['account_name'],
			$this->soap_connection_info['account_password'],
			$COMMAND);
		echo "<a href='http://47.128.250.33/index.php?r=wowsoap/server/help&&command='>返回</a></br>";
		echo "<pre>".$result."</pre>";  }

}
