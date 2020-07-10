
function addNum(x) {
   
    for (let i = 1; i > 0; i++) {
x = x+i
setInterval(() => {
    console.log(x);
    
        }, 1000);

    }
    return x
}

    addNum(10)