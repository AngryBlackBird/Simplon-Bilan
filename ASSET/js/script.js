

window.onload = function () {

    let type = document.getElementById("selectType")
    let speciality = document.getElementById("selectSpeciality")
    let practice = document.getElementById("selectPractice")


    let typeOption = type.querySelectorAll("option")
    let specialityOption = speciality.querySelectorAll("option")
    let practiceOption = practice.querySelectorAll("option")


    let allCard = document.querySelectorAll('.card')

    console.log(allCard[0].classList)



    function filterController(data) {
        /*console.log(data["target"].text)
        console.log(data["target"].parentNode.id)*/

        if (data["target"].parentNode.id == "selectPractice") {
            console.log("selectPractice")



        }
        if (data["target"].parentNode.id == "selectSpeciality") {
            console.log("selectSpeciality")
        }
        if (data["target"].parentNode.id == "selectType") {
            console.log("selectType")
        }
    }


    function addEventListenerList(list, event, filter) {
        for (var i = 0, len = list.length; i < len; i++) {
            list[i].addEventListener(event, filterController.bind(list[i]), false)
        }
    }

    addEventListenerList(typeOption, 'click', 'type');
    addEventListenerList(specialityOption, 'click', 'speciality');
    addEventListenerList(practiceOption, 'click', 'practice');



}
