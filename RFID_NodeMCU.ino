
#include <ESP8266WiFi.h>     //  Esp library
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>        // RFID library

#define SS_PIN D8 
#define RST_PIN D3


MFRC522 mfrc522(SS_PIN, RST_PIN); // kreirana MFRC522 instanca


String getData ,Link;
String CardID="";

void setup() {
  delay(1000);
  Serial.begin(115200);
  SPI.begin();  // Init SPI bus
  mfrc522.PCD_Init(); // Init MFRC522 card

  
  delay(1000);
  WiFi.mode(WIFI_STA);        //sakrij promatranje ESP-a kao WIFI hotspot
  
  
  WiFi.beginSmartConfig();

  
  Serial.println("Waiting for SmartConfig.");
  while (!WiFi.smartConfigDone()) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("SmartConfig done.");

  
  Serial.println("Waiting for WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("WiFi Connected.");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());

  
}

void loop() {
  
  
  //traži novu karticu
   if ( ! mfrc522.PICC_IsNewCardPresent()) {
  return;//vrati se na početak petlje, ako nema kartice
 }
 // odaberi jednu od kartica
 if ( ! mfrc522.PICC_ReadCardSerial()) {
  return;// ako pročitana kartica vraća vrijednost 1, uid struktura odgovara ID-U  pročitane kartice
 }

 for (byte i = 0; i < mfrc522.uid.size; i++) {
     CardID += mfrc522.uid.uidByte[i];
}
  
  HTTPClient http;    // deklarirana  HTTPClient klasa
  
  //uzimanje podataka
  getData = "?CardID=" + CardID;  
  Link = "http://10.0.3.113/Web_aplikacija_za_evidenciju_radnog_vremena/a_evidencija.php" + getData; //link na putanju mape gjde se nalazi kod za povezivanje
  
  http.begin(Link);
  
  int httpCode = http.GET();            //pošalji zahtjev
  delay(10);
  String payload = http.getString();    //uzimanje informacija
  
  Serial.println(httpCode);   //ispiši HTTP kod
  Serial.println(payload);    //ispiši zahtjev informacija
  Serial.println(CardID);     //ispiši ID kartice
  
  if(payload == "login"){
    
    delay(500);  //objavi podatke na svakih 5 sekundi
  }
  else if(payload == "logout"){
   
    delay(500);  //objavi podatke na svakih 5 sekundi
  }
  else if(payload == "succesful" || payload == "Cardavailable"){
    
    delay(500);  
  }
  delay(500);
  
  CardID = "";
  getData = "";
  Link = "";
  http.end();  //zatvori povezivanje
  
 
}
