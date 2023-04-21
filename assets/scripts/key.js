const array = ["ArrowUp", "ArrowUp", "ArrowDown", "ArrowDown", "ArrowLeft", "ArrowRight", "ArrowLeft", "ArrowRight", "B", "A", "Enter"];
let index = 0;
// console.log(atob(env.URL));
document.addEventListener("keydown", (event) => {
    const key = event.key;
    if(key.toLowerCase() === array[index].toLowerCase()){
        index++;
        // console.log(key);
        if(index === array.length){
            // console.log("ok");
            window.location.replace(atob(env.URL) + "admin/");
        }
    } else {
        index = 0;
    }
})