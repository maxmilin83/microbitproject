var firebaseConfig = {
  apiKey: "AIzaSyAoC_vx08HVLPM8Z5vOYvHvDxgj6oX9Lio",
  authDomain: "computer-science-project-98b90.firebaseapp.com",
  databaseURL: "https://computer-science-project-98b90-default-rtdb.firebaseio.com",
  projectId: "computer-science-project-98b90",
  storageBucket: "computer-science-project-98b90.appspot.com",
  messagingSenderId: "677362104946",
  appId: "1:677362104946:web:5678f76459dc3cf007a0eb",
  };

 // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


// This gets data from the firebase and sents it to a table in my html code
function SelectAllData(){
  firebase.database().ref('MyMicrobit').once('value',  // I had to specify where the data will be retrieved from
  function(AllRecords){
    AllRecords.forEach(
      function(CurrentRecord){
        var status = CurrentRecord.val().Status;
        var timestamp = CurrentRecord.val().Timestamp;
        AddItemsToTable(status,timestamp);
      }

    );
  });

}

window.onload = SelectAllData;


//Fill Data//
function AddItemsToTable(status,timestamp){
  var tbody = document.getElementById('tbody1');
  var trow = document.createElement('tr');
  var td1 = document.createElement('td');
  var td2 = document.createElement('td');
  td1.innerHTML= status;
  td2.innerHTML= timestamp;
  trow.appendChild(td1);
  trow.appendChild(td2);
  tbody.appendChild(trow);
}


var myDB = firebase.database().ref('Data');


//these two functions change the condition to either "on" or "off" in the data folder in the firebase.
//the functions are called whenever i press the on / off button on my website.
function on(){
    myDB.set({
        'Condition' : 'on'
    });

}

function off(){
    myDB.set({
        'Condition' : 'off'
    })

}
