var ari = require('ari-client');
var util = require('util');
var chanArr = [];
//var express = require('express'),
//app = express(),
//server = require('http').createServer(app),
//io = require('socket.io').listen(server);
//io = require('socket.io');
const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server);

//ARI client
ari.connect('http://192.168.0.42:8088', 'aycent_ari', 'AffPu3Gd8taL2yu2rGKN2brph', clientLoaded);
function clientLoaded(err, client) {
    if (err) {
        throw err;
    }
    // find or create a holding bridges
    var bridge = null;
    client.bridges.list(function (err, bridges) {
        if (err) {
            throw err;
        }

        bridge = bridges.filter(function (candidate) {
                return candidate.bridge_type === 'mixing';
            })[0];

        if (bridge) {
            console.log(util.format('Using bridge %s', bridge.id));
        } else {
            client.bridges.create({
                type : 'mixing'
            }, function (err, newBridge) {
                if (err) {
                    throw err;
                }

                bridge = newBridge;
                console.log(util.format('Created bridge %s', bridge.id));
            });
        }
    });

    // handler for StasisStart event
    function stasisStart(event, channel) {
        console.log(util.format(
                'Channel %s just entered our application, adding it to bridge %s',
                channel.name,
                bridge.id));

        channel.answer(function (err) {
            if (err) {
                throw err;
            }

            bridge.addChannel({
                channel : channel.id
            }, function (err) {
                var id = chanArr.push(channel.name)
                    console.log("User: " + channel.name);
                if (err) {
                    throw err;
                }

                //If else statement to start music for first user entering channel, music will stop once more than 1 enters the channel.
                if (chanArr.length <= 1) {
                    bridge.startMoh(function (err) {
                        if (err) {
                            throw err;
                        }
                    });
                } else {
                    bridge.stopMoh(function (err) {
                        if (err) {
                            throw err;
                        }
                    });
                }

            });
        });
    }

    // handler for StasisEnd event
    function stasisEnd(event, channel) {
        chanArr = null;
        console.log(util.format(
                'Channel %s just left our application', channel.name));
    }
    client.on('StasisStart', stasisStart);
    client.on('StasisEnd', stasisEnd);
    client.start('bridge-hold');
}

//Socket.io logic here
server.listen(3009, () => {
    console.log('listening on *:3009');
});

app.use(express.static(__dirname + '/js'));
app.get('/', function (req, res) {
    res.sendfile(__dirname + "/testPage.html");
});

io.on('connection', (socket) => {
console.log('a user connected');
    updateSip();
});

function updateSip() {
    io.emit('sip', chanArr);
console.log('a user1 connected');
}

