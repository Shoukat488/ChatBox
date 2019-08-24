var mongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:80";

function dataBase(){
mongoClient.connect(url, (err, client)=>{

    const db = client.db('users');

    var data = db.collection('loginData').find()

    console.log(JSON.stringify(data));
})
}
$(document).ready(()=>{

    $('#login').click({

        dataBase();
    })
})