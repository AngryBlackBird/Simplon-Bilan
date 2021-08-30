window.onload = function () {

    let div = document.getElementById("myTopnav2")
    let style
    if (null != div) {

        function getStyle(a, b) {
            return window.getComputedStyle(b, null)[a];
        }

        style = getStyle('display', div);

    }

    let type = document.getElementsByClassName("selectType")
    let speciality = document.getElementsByClassName("selectSpeciality")
    let practice = document.getElementsByClassName("selectPractice")


    if (style === "none") {
        type = type[1]
        speciality = speciality[1]
        practice = practice[1]
    } else {
        type = type[0]
        speciality = speciality[0]
        practice = practice[0]
    }

    console.log(div)


    let allCard = document.querySelectorAll('.card')

    array = [
        ["speciality", ""],
        ["type", ""],
        ["practiceF", ""]
    ]

    function filterController(data) {
        console.log(data.className)
        if (data.className == (practice.className )) {
            console.log("ok")
            array[2].splice(1, 1, data["value"])
        }

        if (data.className == (type.className)) {
            array[1].splice(1, 1, data["value"])
        }
        if (data.className == (speciality.className)) {
            array[0].splice(1, 1, data["value"])
        }

        for (var i = 0, len = allCard.length; i < len; i++) {
            if (allCard[i].className.includes(array[0][1]) && allCard[i].className.includes(array[1][1]) && allCard[i].className.includes(array[2][1])) {
                allCard[i].style.display = "block"
            } else {
                allCard[i].style.display = "none"
            }
        }
    }

    practice.addEventListener("change", function () {
        filterController(practice)
    }, false)

    speciality.addEventListener("change", function () {
        filterController(speciality)
    }, false)
    type.addEventListener("change", function () {
        filterController(type)
    }, false)

}
