let socket = io.connect(webSockets, {transports: ['websocket']});
let _token = $('meta[name="csrf-token"]').attr('content');
// let socket = io();
let width = 720; // We will scale the photo width to this
let height = 720;
let userVideo = document.getElementById("user-video");
let peerVideo = document.getElementById("peer-video");
let muteButton = document.getElementById("Btn_Mute");
let leaveButton = document.getElementById("Btn_Finish");
let cancelSurvey = document.getElementById("Btn_Cancel");
let hideCameraButton = document.getElementById("Btn_Hide");
let divRecordPlayer = document.getElementById("recording-player");
// let divIconRecording = document.getElementById("icn-recording");
let divIconScreenshot = document.getElementById("icn-ss");
let TableSurvey = document.getElementById("tblsurvey");
let Listdocument = document.getElementById("lstdocument");
let BtnSwitch = document.getElementById("Btn_Switch");
let videoPreview = document.getElementById("recording-player1");
let stream;
let todaydate = new Date();
let date = todaydate.getFullYear() + "-" + (todaydate.getMonth() + 1) + "-" + todaydate.getDate();
let todaytime = ("0" + todaydate.getHours()).slice(-2) + ":" + ("0" + todaydate.getMinutes()).slice(-2) + ":" + ("0" + todaydate.getSeconds()).slice(-2);
let canvas = null
let params = new URLSearchParams(window.location.search);
let id = params.get('id');
let user = params.get('userid');
let tgl_srv = params.get("tgl_srv");
let roomName = (id);
let muteFlag = false;
let hideCameraFlag = false;
//let roomName;
let creator = false;
let swc = false;
let rtcPeerConnection;
let userStream;

//Got Devices
navigator.mediaDevices.enumerateDevices().then(gotDevices).catch(handleError);
let devices;

function gotDevices(deviceInfos) {
    devices = deviceInfos.filter(dashboard => dashboard.kind == 'videoinput');
}

let iceServers = {
    iceServers: [{
            url: 'stun:stun.l.google.com:19302'
        },
        {
            url: 'stun:stun1.l.google.com:19302'
        },
        {
            url: 'stun:stun2.l.google.com:19302'
        },
        {
            url: 'stun:stun3.l.google.com:19302'
        },
        {
            url: 'stun:stun4.l.google.com:19302'
        },
        {
            url: 'stun:stunserver.org'
        },
        {
            url: 'turn:numb.viagenie.ca',
            credential: 'muazkh',
            username: 'webrtc@live.com'
        },
        {
            url: 'turn:192.158.29.39:3478?transport=udp',
            credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
            username: '28224511:1379330808'
        },
        {
            url: 'turn:192.158.29.39:3478?transport=tcp',
            credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
            username: '28224511:1379330808'
        }
    ],
};
if (user == null) {
    // divRecordPlayer.style.display = "none";
    // divIconRecording.style.display = "none";
    divIconScreenshot.style.display = "none";
    TableSurvey.style.display = "none";
    cancelSurvey.style.display = "none";
    leaveButton.innerHTML = "Leave";
    // Listdocument.style.display = "none";
    videoPreview.style.display = "none";
} else {
    var table = $('#tblsurvey').DataTable({
        "columns": [{
            "title": "No"
        }, {
            "title": "Preview"
        }, {
            "title": "Category"
        }, {
            "title": "Type"
        }, {
            "title": "Remark"
        }, {
            "title": "Action"
        }],
        "responsive": true,
        "autoWidth": true,
    });
    table.on('order.dt search.dt', function () {
        table.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    table.on('click', 'tbody tr td i.btnDelete', function (e) {
        console.log($(this).parent());
        table.row($(this).parents('tr')).remove().draw(false);
    });
}

function takeScreenshot() {
    canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    canvas.width = width;
    canvas.height = height;
    context.drawImage(peerVideo, 0, 0, width, height);
    var data = canvas.toDataURL('image/jpeg');
    $("#validation").attr('src', data);
    $("#modal-validation").modal('show');
    console.log(data);
    table.row.add([
        '',
        '<div><img style="width:80px; height:80px;" src="' + data +
        '" id="img-capture" name="img-capture[]" alt="The screen capture will appear in this box."></div>',
        'Image',
        '<select id="type-capture" name="type-capture[]" class="form-control"><option value=""></option><option value="Bagian Depan">Bagian Depan</option><option value="Bagian Belakang">Bagian Belakang</option><option value="Bagian Depan Kanan">Bagian Depan Kanan</option><option value="Bagian Depan Kiri">Bagian Depan Kiri</option><option value="Bagian Samping Kanan">Bagian Samping Kanan</option><option value="Bagian Samping Kiri">Bagian Samping Kiri</option><option value="Bagian Belakang Kanan">Bagian Belakang Kanan</option><option value="Bagian Belakang Kiri">Bagian Belakang Kiri</option></select>',
        '<input id="remarks-capture" name="remarks-capture[]" type="text" class="form-control">',
        '<i class="fas fa-trash fa-lg btnDelete" type="button" style="color: red"></i>'
    ]).draw();
}

function Preview() {
    if (user == null || user == "") {
        alert('Thanks for your participant');
        window.location.href = "https://www.aca.co.id/home";
    } else {
        $("#modal-Datatable").modal('show');
        console.log(data);
    }
}

function PreviewVideo() {
    $("#modal-video").modal('show');
    console.log(data);
}

muteButton.addEventListener("click", function () {
    muteFlag = !muteFlag;
    if (muteFlag) {
        userStream.getTracks()[0].enabled = false;
        muteButton.className = "fas fa-microphone-slash fa-2x";
    } else {
        userStream.getTracks()[0].enabled = true;
        muteButton.className = "fas fa-microphone fa-2x";
    }
});

hideCameraButton.addEventListener("click", function () {
    hideCameraFlag = !hideCameraFlag;
    if (hideCameraFlag) {
        userStream.getTracks()[1].enabled = false;
        hideCameraButton.className = "fas fa-video-slash fa-2x";
    } else {
        userStream.getTracks()[1].enabled = true;
        hideCameraButton.className = "fas fa-video fa-2x";
    }
});

function handleError(error) {
    console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
}

socket.on("created", function () {
    var media;
    if (devices.length > 1) {
        media = {
            audio: true,
            video: {
                facingMode: {
                    exact: "environment"
                }
            }
        }
    } else {
        media = {
            audio: true,
            video: {
                facingMode: {
                    exact: "user"
                }
            }
        }
    }
    creator = true;
    navigator.mediaDevices.getUserMedia(media)
        .then(function (stream) {
            /* use the stream */
            userStream = stream;
            // divVideoChatLobby.style = "display:none";
            // divButtonGroup.style = "display:flex";
            userVideo.srcObject = stream;
            userVideo.onloadedmetadata = function (e) {
                userVideo.play();
            };
        })
        .catch(function (err) {
            console.log(err);
            /* handle the error */
            alert("Could't Access User Media");
        });
});

socket.on("joined", function () {
    var media;
    if (devices.length > 1) {
        media = {
            audio: true,
            video: {
                facingMode: {
                    exact: "environment"
                }
            }
        }
    } else {
        media = {
            audio: true,
            video: {
                facingMode: {
                    exact: "user"
                }
            }
        }
    }
    creator = false;
    navigator.mediaDevices.getUserMedia(media)
        .then(function (stream) {
            /* use the stream */
            userStream = stream;
            // divVideoChatLobby.style = "display:none";
            // divButtonGroup.style = "display:flex";
            userVideo.srcObject = stream;
            userVideo.onloadedmetadata = function (e) {
                userVideo.play();
            };
            socket.emit("ready", roomName);
        })
        .catch(function (err) {
            /* handle the error */
            alert("Could't Access User Media");
        });
});

socket.on("full", function () {
    alert("Room is Full, Can't Join");
});

socket.on("ready", function () {
    if (creator) {
        rtcPeerConnection = new RTCPeerConnection(iceServers);
        rtcPeerConnection.onicecandidate = OnIceCandidateFunction;
        rtcPeerConnection.ontrack = OnTrackFunction;
        //console.log(userStream.getTracks());
        rtcPeerConnection.addTrack(userStream.getTracks()[0], userStream);
        rtcPeerConnection.addTrack(userStream.getTracks()[1], userStream);
        // rtcPeerConnection.createOffer(function(offer){},function(){});
        rtcPeerConnection
            .createOffer()
            .then((offer) => {
                rtcPeerConnection.setLocalDescription(offer);
                socket.emit("offer", offer, roomName);
            })
            .catch((error) => {
                console.log(error);
            });
    }
});

socket.on("candidate", function (candidate) {
    var icecandidate = new RTCIceCandidate(candidate);
    rtcPeerConnection.addIceCandidate(icecandidate);
});

socket.on("offer", function (offer) {
    if (!creator) {
        rtcPeerConnection = new RTCPeerConnection(iceServers);
        rtcPeerConnection.onicecandidate = OnIceCandidateFunction;
        rtcPeerConnection.ontrack = OnTrackFunction;
        rtcPeerConnection.addTrack(userStream.getTracks()[0], userStream);
        rtcPeerConnection.addTrack(userStream.getTracks()[1], userStream);
        rtcPeerConnection.setRemoteDescription(offer);
        rtcPeerConnection
            .createAnswer()
            .then((answer) => {
                rtcPeerConnection.setLocalDescription(answer);
                socket.emit("answer", answer, roomName);
            })
            .catch((error) => {
                console.log(error);
            });
    }
});

socket.on("answer", function (answer) {
    rtcPeerConnection.setRemoteDescription(answer);
});

function FinishSurvey() {
    console.log(urlSurvey);
    let ActualDate = date
    let StartTimeSurvey = todaytime
    let time = new Date();
    let FinishTimeSurvey = ("0" + time.getHours()).slice(-2) + ":" + ("0" + time.getMinutes()).slice(-2) + ":" + ("0" + time.getSeconds()).slice(-2);
    // var hit = {
    //     "JSON": "{'PID': '" + id + "',  'ActualDate': '" + ActualDate + "','StartTimeSurvey': '" + StartTimeSurvey + "','EndTimeSurvey': '" + FinishTimeSurvey + "'}",
    //     "XPrivate": get('API.PrivateKey')
    // };
    $.ajax({
        type: "POST",
        url: urlSurvey,
        data: {
            PID: id,
            ActualDate: ActualDate,
            StartTimeSurvey: StartTimeSurvey,
            EndTimeSurvey: FinishTimeSurvey,
            _token: _token
        },
        //crossDomain: true,
    }).done(function (response) {
        console.log(response);
        // resolve();
        if (response.code == '200') {
            alert('Thanks for your participant');
            window.location.href = Survey;
        } else {
            alert('Failed : ' + response.message);
        }
    }).fail(function (xhr, status, error) {
        var message = xhr.responseJSON['message'];
        alert('Failed : ' + message);
        // toastMessage('400',error);
    });
    //     type: "POST",
    //     url: "https://uat2.care.co.id:9096/ACA/WEBAPI2/MiddlewareAPI/Encrypt",
    //     data: hit,
    //     dataType: "JSON",
    //     crossDomain: true,
    //     success: function (data) {
    //         var enc = {
    //             "Data": data.data,
    //             "XPublic": "GE8I19241CVO15TB"
    //         }
    //         $.ajax({
    //             type: "POST",
    //             url: "https://uat2.care.co.id:9096/ACA/WEBAPI2/MiddlewareAPI/FinishSurvey",
    //             data: enc,
    //             dataType: "JSON",
    //             crossDomain: true,
    //             success: function (data) {
    //                 //alert(data.message);
    //                 $("#loadMe").hide();
    //                 alert('Thanks for your participant');
    //                 window.location.href = "https://www.aca.co.id/home";
    //             },
    //             error: function (xhr, textStatus, errorThrown) {
    //                 $("#loadMe").hide();
    //                 alert(textStatus + " " + xhr.responseText);
    //             }
    //         });
    //     },
    //     error: function (xhr, textStatus, errorThrown) {
    //         $("#loadMe").hide();
    //         alert(textStatus + " " + xhr.responseText);
    //     }

}

cancelSurvey.addEventListener("click", function () {
    if (confirm('Are you sure you want to cancel this Survey?')) {
        alert('Thanks for your participant');
        socket.emit("leave", roomName);
        // divVideoChat.style = "display:none";
        // divButtonGroup.style = "display:none";
        body.style = "display:none";

        if (userVideo.srcObject) {
            userVideo.srcObject.getTracks()[0].stop();
            userVideo.srcObject.getTracks()[1].stop();
        }
        if (peerVideo.srcObject) {
            peerVideo.srcObject.getTracks()[0].stop();
            peerVideo.srcObject.getTracks()[1].stop();
        }

        if (rtcPeerConnection) {
            rtcPeerConnection.ontrack = null;
            rtcPeerConnection.onicecandidate = null;
            rtcPeerConnection.close();
            rtcPeerConnection = null;
        }
        window.location.href = "https://www.aca.co.id/home";
    }
});

leaveButton.addEventListener("click", function () {
    if (confirm('Are you sure you want to finish this Survey?')) {
        if (user !== null && user !== '') {
            // let TC = document.getElementById("type-capture").value;
            // let RC = document.getElementById("remarks-capture").value;
            let img = document.getElementsByName('img-capture[]');
            let typ = document.getElementsByName('type-capture[]');
            let rmk = document.getElementsByName('remarks-capture[]');
            let PolPic = [];
            for (i = 0; i < img.length; i++) {
                try {
                    if (typ[i].value === "") throw [i + 1] + ' ' + "Type Cannot be Null !";
                    if (rmk[i].value === "") throw [i + 1] + ' ' + "Remark Cannot be Null !";
                } catch (err) {
                    alert(err);
                    typ[i].focus();
                    rmk[i].focus();
                    return false;
                }
                let a = img[i];
                let t = typ[i];
                let r = rmk[i];
                let tf = a.src.replace('data:image/jpeg;base64,', '');
                // let ft = a.src.substring(11, 15);
                PolPic[i] = {
                    ImageID: '0',
                    TmpFile: tf,
                    Title: t.value,
                    Remark: r.value,
                    FileType: 'JPEG'
                }
            }
            $.ajax({
                type: "POST",
                url: urlDocument,
                data: {
                    PID: id,
                    PolicyPIC: PolPic,
                    _token: _token
                },
            }).done(function (response) {
                console.log(response);
                // resolve();
                if (response.code == '200') {
                    FinishSurvey();
                } else {
                    alert('Failed : ' + response.message);
                }
            }).fail(function (xhr, status, error) {
                var message = xhr.responseJSON['message'];
                alert('Failed : ' + message);
                // toastMessage('400',error);
            });

            // let PolicyPIC = JSON.stringify(PolPic);
            // let hit = {
            //     "JSON": "{'PID': '" + id + "','PolicyPIC': " + PolicyPIC + "}",
            //     "XPrivate": "89T29UCH8X649K6W"
            // };
            // $.ajax({
            //     type: "POST",
            //     url: "https://uat2.care.co.id:9096/ACA/WEBAPI2/MiddlewareAPI/Encrypt",
            //     data: hit,
            //     dataType: "JSON",
            //     crossDomain: true,
            //     success: function (data) {
            //         var enc = {
            //             "Data": data.data,
            //             "XPublic": "GE8I19241CVO15TB"
            //         }
            //         $.ajax({
            //             type: "POST",
            //             url: "https://uat2.care.co.id:9096/ACA/WEBAPI2/MiddlewareAPI/SavePolicyDocument",
            //             data: enc,
            //             dataType: "JSON",
            //             crossDomain: true,
            //             success: function (data) {
            //                 console.log(data.message);
            //                 LoadFunction();
            //             },
            //             error: function (xhr, textStatus, errorThrown) {
            //                 console.log(textStatus + " " + xhr.responseText);
            //             }
            //         });
            //     },
            //     error: function (xhr, textStatus, errorThrown) {
            //         console.log(textStatus + " " + xhr.responseText);
            //     }
            // });

            // socket.emit("leave", roomName);

            // // divVideoChat.style = "display:none";
            // // divButtonGroup.style = "display:none";
            // body.style = "display:none";

            // if (userVideo.srcObject) {
            //     userVideo.srcObject.getTracks()[0].stop();
            //     userVideo.srcObject.getTracks()[1].stop();
            // }
            // if (peerVideo.srcObject) {
            //     peerVideo.srcObject.getTracks()[0].stop();
            //     peerVideo.srcObject.getTracks()[1].stop();
            // }

            // if (rtcPeerConnection) {
            //     rtcPeerConnection.ontrack = null;
            //     rtcPeerConnection.onicecandidate = null;
            //     rtcPeerConnection.close();
            //     rtcPeerConnection = null;
            // }
            // } else {
            //     alert('Thanks for your participant');
            //     socket.emit("leave", roomName);
            //     // divVideoChat.style = "display:none";
            //     // divButtonGroup.style = "display:none";
            //     body.style = "display:none";

            //     if (userVideo.srcObject) {
            //         userVideo.srcObject.getTracks()[0].stop();
            //         userVideo.srcObject.getTracks()[1].stop();
            //     }
            //     if (peerVideo.srcObject) {
            //         peerVideo.srcObject.getTracks()[0].stop();
            //         peerVideo.srcObject.getTracks()[1].stop();
            //     }

            //     if (rtcPeerConnection) {
            //         rtcPeerConnection.ontrack = null;
            //         rtcPeerConnection.onicecandidate = null;
            //         rtcPeerConnection.close();
            //         rtcPeerConnection = null;
            //     }
            //     window.location.href = "https://www.aca.co.id/home";
        }
    } else {
        // Do nothing!
        console.log('LANJUTKAN BOSS!!!!');
    }
});

socket.on("leave", function () {
    creator = true;

    if (rtcPeerConnection) {
        rtcPeerConnection.ontrack = null;
        rtcPeerConnection.onicecandidate = null;
        rtcPeerConnection.close();
        rtcPeerConnection = null;
    }

    if (peerVideo.srcObject) {
        peerVideo.srcObject.getTracks()[0].stop();
        peerVideo.srcObject.getTracks()[1].stop();
    }
});

function OnIceCandidateFunction(event) {
    //console.log("Candidate");
    if (event.candidate) {
        socket.emit("candidate", event.candidate, roomName);
    }
}

function OnTrackFunction(event) {
    peerVideo.srcObject = event.streams[0];
    peerVideo.onloadedmetadata = function (e) {
        peerVideo.play();
    };
}

function genLink() {
    if (roomName != null) {
        socket.emit("join", roomName);
    } else {
        alert("room not valid");
    }
}

window.addEventListener("load", function () {
    const clock = document.getElementById("timer");
    let time = -1,
        intervalId;

    function incrementTime() {
        time++;
        clock.textContent =
            ("0" + Math.trunc(time / 60)).slice(-2) +
            ":" + ("0" + (time % 60)).slice(-2);
    }
    incrementTime();
    intervalId = setInterval(incrementTime, 1000);
});


(() => {
    const supports = navigator.mediaDevices.getSupportedConstraints();
    if (!supports['facingMode']) {
        alert('Browser Not supported!');
        return;
    }

    const capture = async facingMode => {
        const options = {
            audio: false,
            video: {
                facingMode: '',
            },
        };

        try {
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
            }
            stream = await navigator.mediaDevices.getUserMedia(options);
        } catch (e) {
            alert(e);
            return;
        }
        userVideo.srcObject = null;
        userVideo.srcObject = stream;
        userVideo.play();
    }

    BtnSwitch.addEventListener('click', () => {
        if (BtnSwitch.className === "fas fa-toggle-off fa-2x") {
            BtnSwitch.className = "fas fa-toggle-on fa-2x";
            capture('environment');
        } else if (BtnSwitch.className === "fas fa-toggle-on fa-2x") {
            BtnSwitch.className = "fas fa-toggle-off fa-2x";
            capture('user');
        }
    });
})();