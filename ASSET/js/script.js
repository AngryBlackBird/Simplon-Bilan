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

    let typeOption = type[0].querySelectorAll("option")
    let specialityOption = speciality[0].querySelectorAll("option")
    let practiceOption = practice[0].querySelectorAll("option")


    if (style === "none") {
        typeOption = type[1].querySelectorAll("option")
        specialityOption = speciality[1].querySelectorAll("option")
        practiceOption = practice[1].querySelectorAll("option")
    } else {

        typeOption = type[0].querySelectorAll("option")
        specialityOption = speciality[0].querySelectorAll("option")
        practiceOption = practice[0].querySelectorAll("option")

    }

    console.log(div)




    let allCard = document.querySelectorAll('.card')

    array = [
        ["speciality", ""],
        ["type", ""],
        ["practiceF", ""]
    ]

    function filterController(data) {

        if (data["target"].parentNode.className == (practice[0].className || practice[1].className)) {
            console.log("ok")
            array[2].splice(1, 1, data["target"].value)
        }

        if (data["target"].parentNode.className == (type[0].className || type[1].className)) {
            array[1].splice(1, 1, data["target"].value)
        }
        if (data["target"].parentNode.className == (speciality[0].className || speciality[1].className)) {
            array[0].splice(1, 1, data["target"].value)
        }

        for (var i = 0, len = allCard.length; i < len; i++) {
            if (allCard[i].className.includes(array[0][1]) && allCard[i].className.includes(array[1][1]) && allCard[i].className.includes(array[2][1])) {
                allCard[i].style.display = "block"
            } else {
                allCard[i].style.display = "none"
            }
        }
    }


    function addEventListenerList(list, event, filter) {

        for (var i = 0, len = list.length; i < len; i++) {
            list[i].addEventListener(event, filterController.bind(list[i]), false)
        }
    }


    addEventListenerList(practiceOption, 'click', 'practice');
    addEventListenerList(specialityOption, 'click', 'speciality');
    addEventListenerList(typeOption, 'click', 'type');


}
