
function envoyerSMS(){
    const messageAenvoyer = document.getElementById("messageAenvoyer").value;
    const numTelToElement = document.getElementById("phone").value;

    const message = encodeURI(messageAenvoyer);
    const numTelTo = encodeURI(numTelToElement);

    const url = "https://api.twilio.com/2010-04-01/Accounts/ACf0b7b15ad7d3f3a51fd74df874037392/Messages.json";
    
    const auth = "ACf0b7b15ad7d3f3a51fd74df874037392:9b8c19da713eadd520b5357ecb4e9de3";

    const myHeader = new Headers({
        'Content-Type': 'application/x-www-form-urlencoded',
        'Authorization':'Basic ' + btoa(auth)
    });

    const init = {
        method :'POST',
        headers : myHeader,
        mode : 'cors',
        body:"To="+numTelTo+"&From=%TON_MUM_EXP&Body="+message
    }

    fetch(url, init)
        .then(response => console.log(response))
        .catch(error => console.log(error));

    
}