<style>
footer {
    color: #c4c2c2;
    padding: 6px;
    display:flex;
    justify-content: center;
    margin-left :40px;
  }
  
  footer h4 {
    font-size: 20px;
    margin-bottom: 10px;
  }
  
  footer p {
    font-size: 16px;
    margin-bottom: 15px;
  }
  
  footer ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  footer li {
    font-size: 16px;
  }
  
  footer a {
    color: #2a2ac9;
    text-decoration: none;
  }
  
  .icons li {
    display: inline-block;
    margin-right: 5px;
  }
  
  footer ul li img{
    width: 50px;
  }


  .aboutus{
    width:30%;
    justify-content: center;
  }
  .contact{
    width:40%;
    justify-content: center;
  }
  .follow{
    width:30%;
    justify-content: center;
  }
  
  @media screen and (max-width: 750px){
    footer{
      flex-direction: column;
      align-items: center;
      width:100%
    }
  }
  </style>


<body>
  <footer>
          <div class=aboutus>
                <h4>About Us</h4>
                <p>We are a little team that want to share our knowledge in animes and movie taste!</p>
          </div>
          <div class=contact>
                <h4>Contacter-nous</h4>
                <ul>
                  <li> Email: <a href="mailto:web@crosemont.qc.ca">web@crosemont.qc.ca</a></li>
                  <li>Addresse: 6400 16e Avenue, Montréal, QC H1X 2S9</li>
                </ul>
          </div>
          <div class=follow>
                <h4>Suivez-nous</h4>
                <ul class="icons">
                  <li><a href="https://www.facebook.com/collegederosemont"><img src="img/fb.png" alt="facebook"></i></a></li>
                  <li><a href="https://twitter.com/CollegeRosemont"><img src="img/Twitter_Logo.png" alt="twitter"></a></li>
                  <li><a href="https://www.instagram.com/collegerosemont"><img src="img/ig.png" alt="instagram"></a></li>
                </ul>
          </div>
          </footer>
</html>