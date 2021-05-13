document.addEventListener('DOMContentLoaded', function(){ 
 
    setTimeout(() => {
        Array.from(document.getElementsByClassName('tp-revslider-slidesli')).map(e => { 
            e.dataset.thumb = "";
        })

        Array.from(document.getElementsByClassName('.tp-arr-imgholder')).map(e => { 
            e.style.backgroundImage = "none";
        })
    } , 1500)
    

    // Array.from(document.getElementsByTagName('img')).map(e => { 
    //     // Open a log file
    //     // var myLog = new File([] , e.src + ".webp");

    //     // // See if the file exists
    //     // if(myLog.exists()){
    //     //     console.log('The file exists');
    //     // }else{
    //     //     console.log('The file does not exist');
    //     // }

    // })
});