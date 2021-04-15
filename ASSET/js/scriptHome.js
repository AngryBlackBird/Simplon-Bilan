let allImg = document.querySelectorAll(".imgHome")

let number = 1;


function transitionOff(element) {

    let opacitySet2 = setInterval(function () {
        let test = parseFloat(element.style.opacity)
        test -= 0.02
        element.style.opacity = test
        if (element.style.opacity <= 0) {
            clearInterval(opacitySet2)
        }
    }, 15)
}
function transitionOn(element) {


    let opacitySet2 = setInterval(function () {
        let test = parseFloat(element.style.opacity)
        test += 0.02
        element.style.opacity = test

        if (element.style.opacity >= 1) {
            clearInterval(opacitySet2)
        }

    }, 15)
}

function changeImg() {


    if (number == allImg.length) {
        allImg[number - 1].style.opacity = 1
        transitionOff(allImg[number - 1])

        number = 0
    }

    allImg[number].style.opacity = 0
    transitionOn(allImg[number])


    if (number != 0) {
        allImg[number - 1].style.opacity = 1
        transitionOff(allImg[number - 1])
    }

    number++

}







window.setInterval(changeImg, 5000)

let svg = document.getElementsByClassName("svgAccueil")
let homeId = document.getElementById("home")
svg[0].style.left = 95 + "%"
homeId.style.opacity = 1

function changeOpacity(value) {
    let test = parseFloat(homeId.style.opacity)
    test += value

    homeId.style.opacity = test
    if (homeId.style.opacity <= 0) {
        homeId.style.opacity = 0
    } else if (homeId.style.opacity >= 1) {
        homeId.style.opacity = 1
    }
}
function changeLeft(value) {
    console.log(svg[0].style.left)
    let test = parseFloat(svg[0].style.left)
    console.log(test += value)
    test += value
    svg[0].style.left = test + "%"
  
}


function homeOpacity() {

    var y = window.scrollY;

    if (event.deltaY > 0) {
        if (y >= homeId.offsetHeight) {

            return
        }
        else if (y >= (homeId.offsetHeight * (10 / 100))) {
            changeLeft(-5)
            changeOpacity(-0.25)

        }
    } else if (event.deltaY < 0) {
        if (y >= homeId.offsetHeight) {

            return
        }
        else if (y >= (homeId.offsetHeight * (10 / 100))) {
            console.log("ok")

            changeLeft(5)
            changeOpacity(0.25)



        }
    }
}


window.addEventListener('wheel', function () { homeOpacity(event) })


