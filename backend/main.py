from flask import Flask, request, json, jsonify
from algo import ImageDetection

app = Flask(__name__)

sprayon = False
pump = False
fan = False
automode = False
temp = 32
moisture = 990
smoke = 360


@app.route('/set-smoke',methods=['POST'])
def setsmoke():
    global smoke
    smoke = request.json['smoke']
    return 'Smoke Set Successfuly'

@app.route('/get-smoke')
def getsmoke():
    global smoke
    return jsonify({'smoke':smoke})

@app.route('/set-temp',methods=['POST'])
def settemp():
    global temp
    temp = request.json['temp']
    return 'Temperature Set Successfuly'

@app.route('/get-temp')
def gettemp():
    global temp
    return jsonify({'temp':temp})

@app.route('/set-auto-on')
def setautoon():
    global automode
    if(automode == True):
        automode = False
    else:
        automode = True   
    return jsonify({'status': automode})

@app.route('/auto')
def auto():
    return jsonify({'status': automode})


@app.route('/set-fan-on')
def setfan():
    global fan
    if(fan == True):
        fan = False
    else:
        fan = True   
    return jsonify({'status': fan})
@app.route('/fan-on')
def onfan():
    global fan
    return jsonify({'status': fan})
@app.route('/set-pump-on')
def setpump():
    global pump
    if(pump == True):
        pump = False
    else:
        pump = True   
    return jsonify({'status': pump})
     
@app.route('/pump-on')
def onpump():
    global sprayon
    return jsonify({'status': pump})

@app.route('/set-spary-on')
def setspary():
    global sprayon
    if(sprayon == True):
        sprayon = False
    else:
        sprayon = True   
    return jsonify({'status': sprayon})
     
@app.route('/spary-on')
def onspray():
    global sprayon
    return jsonify({'status': sprayon})


@app.route('/api',methods=['POST'])
def api():
    data = request.get_json()
    print(data)
    model = ImageDetection()
    return jsonify(model.mainalgo(data.get('image_base64')))


    
    

if __name__ == '__main__':  
    app.run(debug=True)