import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;



public class WatzHelper {
	static String BASE_URL = "http://rest.thslmit.com/";
	
	public static String getSessionID(String apiKey){
		String data = "";
		URL url = null;
		HttpURLConnection connection =null;
		try{
			String urlString = BASE_URL + "session/getSessionID?apikey="+apiKey;
			url = new URL(urlString);
			connection = (HttpURLConnection)url.openConnection();
			connection.setRequestMethod("GET");
			connection.connect();
			BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			StringBuffer response = new StringBuffer(); 
			String line;
			if((line = br.readLine()) != null){
				while((line = br.readLine()) != null) {
					data+=line+"\n";

				}
			}
			
		}catch(Exception e){
			e.printStackTrace();
		}

		return data;
	}
	
	public static String startSession(String apiKey, String sessionID, String startCoordinate){
		String data = "";
		URL url = null;
		HttpURLConnection connection =null;
		try{
			String urlString = BASE_URL + "session/startSession?apikey="+ apiKey + "&sessionID=" + sessionID + "&StartCoordinate=" + startCoordinate;
			url = new URL(urlString);
			connection = (HttpURLConnection)url.openConnection();
			connection.setRequestMethod("GET");
			connection.connect();
			BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			StringBuffer response = new StringBuffer(); 
			String line;
			if((line = br.readLine()) != null){ 
				while((line = br.readLine()) != null) {
					data+=line+"\n";

				}
			}
			
		}catch(Exception e){
			e.printStackTrace();
		}

		return data;
	}
	
	public static String appendNode(String apiKey, String sessionID, String latitude, String longitude, String altitude){
		String data = "";
		URL url = null;
		HttpURLConnection connection =null;
		try{
			String urlString = BASE_URL + "session/appendNode?apikey="+apiKey + "&sessionID=" + sessionID + "&latitude=" + latitude +
					           "&longitude=" + longitude + "&altitude=" + altitude;
			url = new URL(urlString);
			connection = (HttpURLConnection)url.openConnection();
			connection.setRequestMethod("GET");
			connection.connect();
			BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			StringBuffer response = new StringBuffer(); 
			String line;
			if((line = br.readLine()) != null){
				while((line = br.readLine()) != null) {
					data+=line+"\n";

				}
			}
			
		}catch(Exception e){
			e.printStackTrace();
		}

		return data;
	}
	
	public static String getTailNode(String apiKey, String sessionID){
		String data = "";
		URL url = null;
		HttpURLConnection connection =null;
		try{
			String urlString = BASE_URL + "session/getTailNode?apikey="+apiKey + "&sessionID=" + sessionID;
			url = new URL(urlString);
			connection = (HttpURLConnection)url.openConnection();
			connection.setRequestMethod("GET");
			connection.connect();
			BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			StringBuffer response = new StringBuffer(); 
			String line;
			if((line = br.readLine()) != null){
				while((line = br.readLine()) != null) {
					data+=line+"\n";

				}
			}
			
		}catch(Exception e){
			e.printStackTrace();
		}

		return data;
	}
	
	public static String endSession(String apiKey, String sessionID, String endCoordinate){
		String data = "";
		URL url = null;
		HttpURLConnection connection = null;
		try{
			String urlString = BASE_URL + "session/endSession?apikey=" + apiKey + "&sessionID="+ sessionID + "&EndCoordinate=" + endCoordinate;
			url = new URL(urlString);
			connection = (HttpURLConnection)url.openConnection();
			connection.setRequestMethod("GET");
			connection.connect();
			BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			StringBuffer response = new StringBuffer(); 
			String line;
			if((line = br.readLine()) != null){
				while((line = br.readLine()) != null) {
					data+=line+"\n";

				}
			}
			
		}catch(Exception e){
			e.printStackTrace();
		}

		return data;
	}
	
	
	/*public static String createUser(String apiKey, String email, String acctLevel, String password){
		String data = "";
		URL url = null;
		HttpURLConnection connection =null;
		try{
			String urlString = BASE_URL + "user/createAccount?apikey="+apiKey ;
			url = new URL(urlString);
			connection = (HttpURLConnection)url.openConnection();
			connection.setRequestMethod("GET");
			connection.connect();
			BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
			StringBuffer response = new StringBuffer(); 
			String line;
			if((line = br.readLine()) != null){
				while((line = br.readLine()) != null) {
					data+=line+"\n";

				}
			}
			
		}catch(Exception e){
			e.printStackTrace();
		}

		return data;
	}*/
	
}	
