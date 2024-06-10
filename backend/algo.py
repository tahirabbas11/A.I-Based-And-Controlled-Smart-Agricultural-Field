# Imporiting Necessary Libraries
import streamlit as st
from PIL import Image
import base64
import io
import numpy as np
import tensorflow as tf
from utils import clean_image, get_prediction, make_results

class ImageDetection:
    def __init__(self):
        self.model = self.load_model('model.h5')
    def load_model(self,path):
        
        # Xception Model
        xception_model = tf.keras.models.Sequential([
        tf.keras.applications.xception.Xception(include_top=False, weights='imagenet', input_shape=(512, 512, 3)),
        tf.keras.layers.GlobalAveragePooling2D(),
        tf.keras.layers.Dense(4,activation='softmax')
        ])


        # DenseNet Model
        densenet_model = tf.keras.models.Sequential([
            tf.keras.applications.densenet.DenseNet121(include_top=False, weights='imagenet',input_shape=(512, 512, 3)),
        tf.keras.layers.GlobalAveragePooling2D(),
        tf.keras.layers.Dense(4,activation='softmax')
        ])

        # Ensembling the Models
        inputs = tf.keras.Input(shape=(512, 512, 3))

        xception_output = xception_model(inputs)
        densenet_output = densenet_model(inputs)

        outputs = tf.keras.layers.average([densenet_output, xception_output])


        model = tf.keras.Model(inputs=inputs, outputs=outputs)

        # Loading the Weights of Model
        model.load_weights(path)
        
        return model
    def mainalgo(self,base64string):
        # Reading the uploaded image
        image = Image.open(io.BytesIO(base64.b64decode(base64string)))
        # image = Image.open(io.BytesIO(uploaded_file.read()))
        st.image(np.array(Image.fromarray(
            np.array(image)).resize((700, 400), Image.ANTIALIAS)), width=None)
        
        # Cleaning the image
        image = clean_image(image)
        print('here')
        # Making the predictions
        predictions, predictions_arr = get_prediction(self.model, image)
        
        
        # Making the results
        result = make_results(predictions, predictions_arr)

        return result
    
    # Show the results