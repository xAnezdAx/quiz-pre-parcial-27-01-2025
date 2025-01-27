from flask import Flask, request, jsonify
import pandas as pd
app = Flask(__name__)

@app.route("/", methods=["GET"])
def read_root():
    return jsonify({"Hello": "World"})

labels = []

@app.route("/record_labels", methods=["GET"])
def read_item():
    df = pd.read_csv("microservicio_flask/labels.csv")
    if df is not None:
        return jsonify(df.to_dict(orient="records"))


@app.route("/generate_labels/<int:n>", methods=["POST"])
def postLabels(n):
    
    for i in range(0,n):
        labels.append({"label_id": i, "label": "label"+str(i)})
    
    df = pd.DataFrame(labels)
    df.to_csv("microservicio_flask/labels.csv", index=False)
    return jsonify(labels)




        
                

    
    
    


if __name__ == "__main__":
    app.run(debug=True)