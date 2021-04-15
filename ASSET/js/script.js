

window.onload = function () {

    let type = document.getElementById("selectType")
    let speciality = document.getElementById("selectSpeciality")
    let practice = document.getElementById("selectPractice")


    let typeOption = type.querySelectorAll("option")
    let specialityOption = speciality.querySelectorAll("option")
    let practiceOption = practice.querySelectorAll("option")

    let allCard = document.querySelectorAll('.card')

    array = [
        ["speciality", ""],
        ["type", ""],
        ["practiceF", ""]
    ]

    function filterController(data) {
        if (data["target"].parentNode.id == practice.id) {
            array[2].splice(1, 1, data["target"].value)
        }

        if (data["target"].parentNode.id == type.id) {
            array[1].splice(1, 1, data["target"].value)
        }
        if (data["target"].parentNode.id == speciality.id) {
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
