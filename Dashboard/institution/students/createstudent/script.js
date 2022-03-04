


let rollnum = document.getElementById('stu-roll');
let stuName = document.getElementById('stu-name');
let stuFaName = document.getElementById('stu-fa-name');
let stuMaName = document.getElementById('stu-ma-name');
let stuBldGrp = document.getElementById('stu-bld-grp');
let stuDob = document.getElementById('stu-dob');
let stuPwd = document.getElementById('stu-pwd');
let stuPwdIssue = document.getElementById('stu-pwd-issue');
let stuIdMark1 = document.getElementById('stu-id-mark-1');
let stuIdMark2 = document.getElementById('stu-id-mark-2');
let stuCont1 = document.getElementById('stu-cont-1');
let stuCont2 = document.getElementById('stu-cont-2');
let stuAddr = document.getElementById('stu-addr');
let stuClass = document.getElementById('stu-class');
let stuEduGrp = document.getElementById('stu-edu-grp');
let stuAcaYear = document.getElementById('stu-aca-year');
let stuPass = document.getElementById('stu-pass');
let stuFaQual = document.getElementById('stu-fa-edu-qual');
let stuMaQual = document.getElementById('stu-ma-edu-qual');
let stuFaOccuType = document.getElementById('stu-fa-occu-type');
let stuMaOccuType = document.getElementById('stu-ma-occu-type');
let stuFaOccu = document.getElementById('stu-fa-occu');
let stuMaOccu = document.getElementById('stu-ma-occu');
let stuAnnInc = document.getElementById('stu-ann-inc');
let stuCaredBy = document.getElementById('stu-parent-less');
let guardianName = document.getElementById('stu-gua-name');
let guardianCont = document.getElementById('stu-gua-cont');


let finalout = document.getElementById('final-out');
let subbtn = document.getElementById('subbtn');

let mangamadaya = {}

function jsonupdater() {
    mangamadaya = {
        roll: rollnum.value,
        name: stuName.value,
        father: stuFaName.value,
        mother: stuMaName.value,
        bloodgrp: stuBldGrp.value,
        dob: stuDob.value,
        pwdSts: stuPwd.value,
        pwdIssue: stuPwdIssue.value,
        idmark1: stuIdMark1.value,
        idmark2: stuIdMark2.value,
        stuclass: stuClass.value,
        stuedugrp: stuEduGrp.value,
        stuacayear: stuAcaYear.value,
        stupass: stuPass.value,
        stucont1: stuCont1.value,
        stucont2: stuCont2.value,
        stuaddr: stuAddr.value,
        stufaqual: stuFaQual.value,
        stumaqual: stuMaQual.value,
        stufaoccutype: stuFaOccuType.value,
        stumaoccutype: stuMaOccuType.value,
        stufaoccu: stuFaOccu.value,
        stumaoccu: stuMaOccu.value,
        stuanninc: stuAnnInc.value,
        stucaredby: stuCaredBy.value,
        guardianname: guardianName.value,
        guardiancont: guardianCont.value,

    }

    let inps = [rollnum, stuName, stuFaName, stuMaName, stuBldGrp, stuDob, stuPwd,
        stuIdMark1, stuIdMark2, stuCont1, stuCont2, stuAddr, stuClass, stuEduGrp, stuAcaYear,
        stuPass, stuFaQual, stuMaQual, stuFaOccuType, stuMaOccuType, stuFaOccu, stuMaOccu,
        stuAnnInc, stuCaredBy];

    let i = 0;
    let count = 0;

    for (i = 0; i < inps.length; i++) {
        if (inps[i].value !== "") {
            count += 1;
        } else {
            continue;
        }

    }
    
    // if (inps.length !== count) {
    //     subbtn.setAttribute('disabled', 'true');
    // } else if(inps.length >= count){
    //     subbtn.removeAttribute('disabled');
    // }


}

function jsonsubmitter() {
    finalout.value = JSON.stringify(mangamadaya);
    
}


window.addEventListener('load', () => {
    jsonupdater();
})