let instSelect = document.getElementById('instit-selector');
let stuSelect = document.getElementById('student-selector');
let teacherSelect = document.getElementById('teacher-selector');
let studStatsSelector = document.getElementById('studstat-selector');

let dropper = document.getElementById('drop-spanner');
let selectionText = document.getElementById('selectors');

let loginInst = document.getElementById('institutionlogin');
let loginStu = document.getElementById('studentlogin');
let loginTeacher = document.getElementById('teacherlogin');
let loginStudStat = document.getElementById('studStatlogin');




let ids = [loginInst, loginStu, loginStudStat, loginTeacher, selectionText];

if (dropper.innerHTML == 'Select Here') {
    for (let i = 0; i < 5; i++) {
        if (ids[i] == selectionText) {
            continue;
        } else {
            ids[i].style.display = "none";
        }
    }
}


instSelect.addEventListener('click', () => {
    dropper.innerHTML = "Institution";
    for (let i = 0; i < 5; i++) {
        console.log(ids[i]);
        if (ids[i] == loginInst) {
            ids[i].style.display = "block";
            continue;
        } else {
            ids[i].style.display = "none";
        }
    }

});

stuSelect.addEventListener('click', () => {
    dropper.innerHTML = "Student"
    for (let i = 0; i < 5; i++) {
        if (ids[i] == loginStu) {
            loginStu.style.display = "block";
            continue;
        } else {
            ids[i].style.display = "none";
        }
    }

});

teacherSelect.addEventListener('click', () => {
    dropper.innerHTML = "Teacher";

    for (let i = 0; i < 5; i++) {
        if (ids[i] == loginTeacher) {
            ids[i].style.display = "block";
            continue;
        } else {
            ids[i].style.display = "none";
        }
    }

});

studStatsSelector.addEventListener('click', () => {
    dropper.innerHTML = "StudStats Admin";

    for (let i = 0; i < 5; i++) {
        if (ids[i] == loginStudStat) {
            loginStudStat.style.display = "block";
            continue;
        } else {
            ids[i].style.display = "none";
        }
    }

});


