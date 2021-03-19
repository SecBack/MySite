<template>
<div>
  <b-container>
   <b-row>
     <b-col>
       <b-row class="justify-content-center">
        <b-card
          title="Number guesser"
          sub-title="Draw a number in the grid, and watch the magic happen"
          style="width: 100%"
          id="card"
        >
          <b-row no-gutters>
            <b-col>
              <div id="canvas" style="width: auto"></div>
              <b-button type="button" variant="primary" id="button">Send Data</b-button>
            </b-col>

            <b-col>
              <b-card-text>
                Guesses will be shown below - number: "chance"
              </b-card-text>
              <!-- commet in js about why i do it like this -->
              <b-card-text class="font-weight-bold">0: <a id="0">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">1: <a id="1">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">2: <a id="2">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">3: <a id="3">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">4: <a id="4">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">5: <a id="5">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">6: <a id="6">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">7: <a id="7">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">8: <a id="8">0.0</a></b-card-text>
              <b-card-text class="font-weight-bold">9: <a id="9">0.0</a></b-card-text>

            </b-col>
          </b-row>
        </b-card>
       </b-row>
     </b-col>
    </b-row>
  </b-container>
</div>
</template>

<script>
import P5 from 'p5'
import axios from 'axios'

export default {
  data() {
    return {
      guesses: [],
    }
  },
  mounted() {
    const script = p5 => {
      var canvas;
      var imgData;
      var ctx;
      let dataArr = [];

      p5.setup = () => {
        canvas = p5.createCanvas(500, 500);
        canvas.width = 28;
        canvas.height = 28;

        canvas = document.getElementById("defaultCanvas0");

        p5.background(255);
      }

      p5.draw = () => {
        p5.stroke(0);
        p5.strokeWeight(20);

        if (p5.mouseIsPressed === true) {
          p5.line(p5.mouseX, p5.mouseY, p5.pmouseX, p5.pmouseY);
        }

        document.getElementById('button').onclick = function() {
          canvas = document.getElementById("defaultCanvas0");

          ctx = p5.canvas.getContext("2d");
          ctx.drawImage(canvas, 0, 0, 28, 28);

          imgData = ctx.getImageData(0, 0, 28, 28);

          for (var i = 0; i < imgData.data.length; i += 4) {
            var red = imgData.data[i];
            var green = imgData.data[i + 1];
            var blue = imgData.data[i + 2];

            if (red + green + blue > 0) {
              dataArr.push(0);
            } else {
              dataArr.push(1);
            }
          }

          axios
            .post("http://nn.albertandersen.dk", dataArr)
            .then((response) => {
              // the libary p5.js needs to run in mounted, meaning mounted
              // will never 'finish' because of p5.draw. which means that
              // getting data out of here is super tedious since i cant
              // use the methods property. This will do for now, might look
              // for another way later.
              for (let i = 0; i < response.data.length; i++) {
                document.getElementById(i).innerHTML = response.data[i]
              }
            }
          )
        }
      }
    }
    const p5canvas = new P5(script, 'canvas');
  },
}
</script>
.then(response => (this.flag = response.data))
<style scoped>
#canvas {
  margin-right: 30px;
  margin-bottom: 15px;
  border-style: solid;
}

#card {
  margin-top: 150px;
}
</style>
