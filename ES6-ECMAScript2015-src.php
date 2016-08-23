<?php
$title = "ES6 - ECMAScript2015";
include "header.php";
?>
<body>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span3">
        <div id="toc-wrapper">
          <div id="toc"></div>
        </div>
        <div id="output"></div>
      </div>
      <div class="span9">
        <div id="console"></div>
        <section>
          <h1>ES6 - ECMAScript2015
        </h1>
          <section>
            <h2>Typed Arrays - Access to raw binary data
          </h2>
            <p>See also Section 6, 48 of Tony Alicea course
            </p>
          </section>
          <section>
            <h2>               Functions
                     </h2>
            <section>
              <h3>             Fat Arrow Functions
         </h3>
              <section>
                <h4>Basics</h4>
                <pre class="lang-js">
// No return statement in single line code
// Even though no args, still need parens

var fn = () => 'Ich bin Berliner!'
console.log(fn())

// Or
var fn = (a,b) => a*b
console.log(fn(3,7)) // 21

// Surplus args ignored
var fn = (a) => a*8
console.log(fn(3,7)) // 24

// With one arg, can omit parens
var fn = a => a*8
console.log(fn(3,7)) // 24

// Can use as callbacks...
setTimeout(()=>console.log('Ik bin das!'),1000)
</pre></section>
              <section>
                <h4>Fat Arrow Functions and <i>this</i>
                     </h4>
                <p> Lets return <code>this</code> using both a function and a fat arrow function.
                </p>
                <pre class="lang-js">
 // Traditional ES5 return of global object
 var fn = function(){
 return this
 }
 console.log(fn())

 // Using ES6, again <code>this</code> refers to global scope var fn = () => this;
 console.log(fn()) </pre>
              </section>
              <section>
                <h5>The Good Ole Days</h5>
                <p>In traditional old style ES5 function declarations, the context of <code>this</code> is determined by the function that invokes it. Basically <code>this</code> changes its context dependent upon where it is called. This often calls for the use of - excuse the pun - call(), and apply(). </p>
                <p> So, we have <code>this</code> which forgets its origins when it finds itself in the scope of another function. Because of this such methods as call() are required to remind <code>this</code> from whence it came. </p>
                <aside>This reminds me of some autistic children, who quite literally do not associate with their parents like your average kid. I had friends with one such kid, who would run off with other families when playing on the beech. There was no attachment to his true parents. </aside>
                <p>
                </p>
                <p>Here is an example where 'fn' is called from within another function (method). This means that the context of this no longer refers to the global object as defined in the original fn() definition. </p>
                <pre> var fn = function(){ console.log(this) }

// var button = document.querySelector('button')
var button = document.getElementById("myButton")
// No parens after fn
button.addEventListener('click',fn)
</pre>
                <p><code>this</code> is bound to the button object, since a method of the button obj invoked the function fn()</p>
                <p>Here is a <a href="http://www.bennadel.com/resources/uploads/2011/using_call_and_apply_to_change_execution_context_in_javascript.jpg">useful graphic</a> to understand the scope of <code>this</code>. Full article by <a href="http://www.bennadel.com/blog/2265-changing-the-execution-context-of-javascript-functions-using-call-and-apply.htm">Ben Nadel</a>.</p>
              </section>
              <section>
                <h5>Fat Arrows make <code>this</code> more loyal to Daddy</h5>
                <p> <code>this</code> does not forget its origins.</p>
                <p><code>this</code> in Fat Arrow function maintains its context ie <code>this</code> is always bound to the context in which it was defined. So, in the example we get the global window object returned</p>
                <p>It does not matter where you call the function. It does not matter in which context you call the function. It does not matter in which scope you call the function, <code>this</code> will always refer to the context in which it was defined. In this eg, the global object.
                </p>
                <PRE>var fn2 = () => console.log(this)
var button = document.querySelector('button')
button.addEventListener('click',fn2)</PRE>
                <p>See how the Fat Arrow kid stays loyal to Daddy here:
                </p>
                <a href="https://jsfiddle.net/ma1colm/bvkvrd80/" class="jsfiddle" target="_blank">Run Code</a>
              </section>
            </section>
          </section>
          <section>
            <h2>Extended Parameter Handling</h2>
            <section>
              <h3>Default Parameter Values</h3>
              <p>Seems pretty logical</p>
              <p>Remember that function parameters assigned a value within function parens are not hoisted. So you can't do this:</p>
              <pre>
function(a = b, b = 7){

}
</pre></section>
            <section>
              <h3>Rest Parameter</h3>
              <div class="codeApp">
            <pre id="sumUp">var sumUp = function(...addMe) {
    let count = 0;
    addMe.forEach(function(item, i) {
        count += item
        console.log('Each array element: ', item);
    });
    console.log('Total: ', count);
};

sumUp(1, 4, 7, 4)</pre>
                <a onClick="codeApp.doDemo('sumUp')" class="sumUp button">Run Code</a>
              </div>
              <!--  <script async src="https://jsfiddle.net/ma1colm/9a3tyrkL/embed/"></script> -->
            </section>
          </section>
          <section>
            <h2>Template Literals</h2>
            <article>
              <h3>Template Literals</h3>
              <p>Originally named 'template strings' in ES6 draft.</p>
              <script async src="https://jsfiddle.net/ma1colm/1L9qt6mu/embed/js,result/"></script>
            </article>
          </section>
          <section>
            <h2>Destructuring</h2>
            <article>
              <h3>Destructuring Arrays</h3>
              <script async src="https://jsfiddle.net/ma1colm/9875aubj/embed/js,result/"></script>
            </article>
            <article>
              <h3>Destructuring Objects</h3>
              <script async src="https://jsfiddle.net/ma1colm/dpLgu086/embed/js,result/"></script>
            </article>
          </section>
        </section>
      </div>
    </div>
  </div>
</body>
<?php
include "footer.php";
?>