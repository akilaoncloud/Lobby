function updateProgressbar(progressBar, value){
    setInterval(() => {
        if (value >= 100){
            clearInterval();
        }
        else {
        value++;
        progressBar.querySelector(".progress_fill").style.width = value + '%';
        progressBar.querySelector(".progress_label").textContent = `${value}%`;
        }
    }, Math.random()*300);
} 

function choosePbar(i){

    var pbar = document.getElementById(i);

    updateProgressbar(pbar,0);
}