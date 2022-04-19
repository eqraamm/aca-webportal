<html>
    <head></head>
    <body>
        <h1>Hello World !</h1>
        <video id="user-video" style="max-width:100%; max-height:100%; border-radius:10px;" muted></video>
        <script src="https://cdn.socket.io/4.3.2/socket.io.min.js"
    integrity="sha384-KAZ4DtjNhLChOB/hxXuKqhMLYvx3b5MlT55xPEiNmREKRzeEm+RVPlTnAn0ajQNs" crossorigin="anonymous"></script>
    <script>
        // let socket = io();
        let socket = io.connect('https://uat2.care.co.id:4000',{ transports : ['websocket']});
        let params = new URLSearchParams(window.location.search);
        let id = params.get('id');
        let user = params.get('userid');
        // io.on("connection", function (socket) {
        //     //console.log("User Connected :" + socket.id);

        //     socket.on("join", function(roomName) {
        //         var rooms = io.sockets.adapter.rooms;
        //         var room = rooms.get(roomName);
        //         console.log(roomName);

        //         if (room == undefined) {
        //             socket.join(roomName);
        //             socket.emit("created");
        //         } else if (room.size == 1){
        //             socket.join(roomName);
        //             socket.emit("joined");
        //         } else {
        //             socket.emit("full");
        //         }
        //         //console.log(rooms);
        //     });
            
        //     socket.on("ready", function(roomName){
        //         socket.broadcast.to(roomName).emit("ready");
        //     });

        //     socket.on("candidate", function(candidate, roomName){
        //         //console.log(candidate);
        //         socket.broadcast.to(roomName).emit("candidate", candidate);
        //     });

        //     socket.on("offer", function(offer, roomName){
        //         socket.broadcast.to(roomName).emit("offer", offer);
        //     });

        //     socket.on("answer", function(answer, roomName){
        //         socket.broadcast.to(roomName).emit("answer", answer);
        //     });

        //     socket.on("leave", function(roomName){
        //         socket.leave(roomName);
        //         socket.broadcast.to(roomName).emit("leave");
        //     });
        // });

        let userVideo = document.getElementById("user-video");
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
        let userStream;
        let stream;

        socket.emit("join", 1);

        socket.on("join", function(roomName) {
            var rooms = io.sockets.adapter.rooms;
            var room = rooms.get(roomName);
            console.log(roomName);

            if (room == undefined) {
                socket.join(roomName);
                socket.emit("created");
            } else if (room.size == 1){
                socket.join(roomName);
                socket.emit("joined");
            } else {
                socket.emit("full");
            }
            //console.log(rooms);
        });

        socket.on("ready", function(roomName){
            socket.broadcast.to(1).emit("ready");
        });
        
        socket.on("created", function () {
            // var a;
            // console.log('tempwait : ' + tempwait.length);
            // if (tempwait.length > 1) {
            //     a = {
            //         video: {
            //             facingMode: {
            //                 exact: "environment"
            //             }
            //         }
            //     }
            // } else {
            //     a = {
            //         video: {
            //             facingMode: {
            //                 exact: "user"
            //             }
            //         }
            //     }
            // }
            creator = true;
            navigator.mediaDevices.getUserMedia({
                    audio: true,
                    video: true
                })
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
            // var a;
            // if (tempwait.length > 1) {
            //     a = {
            //         audio: true,
            //         video: {
            //             facingMode: {
            //                 exact: "environment"
            //             }
            //         }
            //     }
            // } else {
            //     a = {
            //         audio: true,
            //         video: {
            //             facingMode: {
            //                 exact: "user"
            //             }
            //         }
            //     }
            // }
            // alert(tempwait.length);
            creator = false;
            // navigator.mediaDevices.getUserMedia(a)
            navigator.mediaDevices.getUserMedia({
                    audio: true,
                    video: {
                         facingMode: { exact:"environment"}
                    }
                })
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
    </script>
    </body>
</html>