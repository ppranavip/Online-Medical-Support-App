from flask import Flask, render_template, request, jsonify, send_file, url_for
import numpy as np
from sklearn.preprocessing import LabelEncoder
from sklearn.svm import SVC
from sklearn.naive_bayes import GaussianNB
from sklearn.ensemble import RandomForestClassifier
from joblib import load
from flask_cors import CORS
from scipy.stats import mode
from collections import Counter
import pandas as pd
import warnings
warnings.filterwarnings(action='ignore')

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes

# Load the machine learning model and label encoder
encoder_classes = np.load('pickle_files/encoder_classes.npy', allow_pickle=True)

# Load SVM model
svm_model = load('pickle_files/svm_model.joblib')

# Load Naive Bayes model
nb_model = load('pickle_files/nb_model.joblib')

# Load Random Forest model
rf_model = load('pickle_files/rf_model.joblib')

symptom_index =  {
    'Itching': 0,
    'Skin Rash': 1,
    'Nodal Skin Eruptions': 2,
    'Continuous Sneezing': 3,
    'Shivering': 4,
    'Chills': 5,
    'Joint Pain': 6,
    'Stomach Pain': 7,
    'Acidity': 8,
    'Ulcers On Tongue': 9,
    'Muscle Wasting': 10,
    'Vomiting': 11,
    'Burning Micturition': 12,
    'Spotting  urination': 13,
    'Fatigue': 14,
    'Weight Gain': 15,
    'Anxiety': 16,
    'Cold Hands And Feets': 17,
    'Mood Swings': 18,
    'Weight Loss': 19,
    'Restlessness': 20,
    'Lethargy': 21,
    'Patches In Throat': 22,
    'Irregular Sugar Level': 23,
    'Cough': 24,
    'High Fever': 25,
    'Sunken Eyes': 26,
    'Breathlessness': 27,
    'Sweating': 28,
    'Dehydration': 29,
    'Indigestion': 30,
    'Headache': 31,
    'Yellowish Skin': 32,
    'Dark Urine': 33,
    'Nausea': 34,
    'Loss Of Appetite': 35,
    'Pain Behind The Eyes': 36,
    'Back Pain': 37,
    'Constipation': 38,
    'Abdominal Pain': 39,
    'Diarrhoea': 40,
    'Mild Fever': 41,
    'Yellow Urine': 42,
    'Yellowing Of Eyes': 43,
    'Acute Liver Failure': 44,
    'Fluid Overload': 45,
    'Swelling Of Stomach': 46,
    'Swelled Lymph Nodes': 47,
    'Malaise': 48,
    'Blurred And Distorted Vision': 49,
    'Phlegm': 50,
    'Throat Irritation': 51,
    'Redness Of Eyes': 52,
    'Sinus Pressure': 53,
    'Runny Nose': 54,
    'Congestion': 55,
    'Chest Pain': 56,
    'Weakness In Limbs': 57,
    'Fast Heart Rate': 58,
    'Pain During Bowel Movements': 59,
    'Pain In Anal Region': 60,
    'Bloody Stool': 61,
    'Irritation In Anus': 62,
    'Neck Pain': 63,
    'Dizziness': 64,
    'Cramps': 65,
    'Bruising': 66,
    'Obesity': 67,
    'Swollen Legs': 68,
    'Swollen Blood Vessels': 69,
    'Puffy Face And Eyes': 70,
    'Enlarged Thyroid': 71,
    'Brittle Nails': 72,
    'Swollen Extremeties': 73,
    'Excessive Hunger': 74,
    'Extra Marital Contacts': 75,
    'Drying And Tingling Lips': 76,
    'Slurred Speech': 77,
    'Knee Pain': 78,
    'Hip Joint Pain': 79,
    'Muscle Weakness': 80,
    'Stiff Neck': 81,
    'Swelling Joints': 82,
    'Movement Stiffness': 83,
    'Spinning Movements': 84,
    'Loss Of Balance': 85,
    'Unsteadiness': 86,
    'Weakness Of One Body Side': 87,
    'Loss Of Smell': 88,
    'Bladder Discomfort': 89,
    'Foul Smell Of urine': 90,
    'Continuous Feel Of Urine': 91,
    'Passage Of Gases': 92,
    'Internal Itching': 93,
    'Toxic Look (typhos)': 94,
    'Depression': 95,
    'Irritability': 96,
    'Muscle Pain': 97,
    'Altered Sensorium': 98,
    'Red Spots Over Body': 99,
    'Belly Pain': 100,
    'Abnormal Menstruation': 101,
    'Dischromic  Patches': 102,
    'Watering From Eyes': 103,
    'Increased Appetite': 104,
    'Polyuria': 105,
    'Family History': 106,
    'Mucoid Sputum': 107,
    'Rusty Sputum': 108,
    'Lack Of Concentration': 109,
    'Visual Disturbances': 110,
    'Receiving Blood Transfusion': 111,
    'Receiving Unsterile Injections': 112,
    'Coma': 113,
    'Stomach Bleeding': 114,
    'Distention Of Abdomen': 115,
    'History Of Alcohol Consumption': 116,
    'Fluid Overload.1': 117,
    'Blood In Sputum': 118,
    'Prominent Veins On Calf': 119,
    'Palpitations': 120,
    'Painful Walking': 121,
    'Pus Filled Pimples': 122,
    'Blackheads': 123,
    'Scurring': 124,
    'Skin Peeling': 125,
    'Silver Like Dusting': 126,
    'Small Dents In Nails': 127,
    'Inflammatory Nails': 128,
    'Blister': 129,
    'Red Sore Around Nose': 130,
    'Yellow Crust Ooze': 131
}

data_dict = {
    "symptom_index":symptom_index,
    "predictions_classes": encoder_classes
}

@app.route('/symptoms.txt')
def get_symptoms():
    return send_file('symptoms.txt', mimetype='text/plain')

disease_descriptions = pd.read_csv('symptom_Description.csv')

@app.route('/')
def home():
    return render_template('quickdiagnosis.html')

# ...

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.get_json()
        selected_symptoms = data['symptoms']

        # Convert symptoms to input data
        input_data = [0] * len(data_dict['symptom_index'])
        for symptom in selected_symptoms:
            index = data_dict['symptom_index'][symptom]
            input_data[index] = 1
        input_data = np.array(input_data).reshape(1, -1)

        # Convert NumPy array to Python list
        input_data_list = input_data.tolist()

        models_prediction = []
        models = [rf_model, nb_model, svm_model]
        for i in range(3):
            models_prediction.append(data_dict["predictions_classes"][models[i].predict(input_data)[0]])
        prediction_counts = Counter(models_prediction)
        final_prediction = prediction_counts.most_common(1)[0][0]

        # Get the disease description from the CSV file
        disease_description = disease_descriptions[disease_descriptions['Disease'] == final_prediction]['Description'].values[0]

        symptom_precautions = pd.read_csv('symptom_precaution.csv')
        symptom_precaution = symptom_precautions[symptom_precautions['Disease'] == final_prediction].iloc[0]
        symptom_precaution_json = symptom_precaution.to_dict()

        dataset = pd.read_csv('dataset.csv')
        symps = dataset[dataset['Disease'] == final_prediction].iloc[0]
        symps = symps.where(pd.notna(symps), None)
        final_symps = []
        for i in symps:
            if(i != None and i != final_prediction):
                final_symps.append((" ").join(i.title().strip().split('_')))

        severity = pd.read_csv("Symptom-severity.csv")
        weights = severity[severity['Symptom'].isin(selected_symptoms)]['weight'].tolist()
        total_severity = sum(weights)
        normalized_severity = (total_severity / (len(selected_symptoms) * 10)) * 100
        totalSeverity =  total_severity
        normalizedSeverity = round(normalized_severity, 2)


        result = {
            'prediction': final_prediction,
            'description': disease_description,
            'precautions': symptom_precaution_json,
            'all_symptoms':final_symps,
            'totalSeverity': totalSeverity,
            'normalizedSeverity':normalizedSeverity
        }

        return jsonify(result)
    except Exception as e:
        return jsonify({'error': str(e)})

# ...


if __name__ == '__main__':
    app.run(debug=True)
