import env from '../../.env';

const array = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "B", "A", "Enter"];
let index = 0;
document.addEventListener("keydown", (event) => {
    console.log(env.URL);
    const key = event.key;
    if(key.toLowerCase() === array[index].toLowerCase()){
        index++;
        // console.log(key);
        if(index === array.length){
            console.log("ok");
            // window.location.replace(env.URL + "/admin/");
        }
    } else {
        index = 0;
    }
})