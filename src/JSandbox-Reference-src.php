<?php
$title = "JS Reference Sandbox";
$header_img = "header1.jpg";
include "header.htm";
?>
        <section>
          <h1>My JSandbox </h1>
          <section>
            <h2>Overview</h2>
<p>            This JS sandbox is my own attempt at learning the language. I recognise that writing things down and indeed teaching are ways to master anything and to help others at the same time.</p>
<p>So, of course there will be mistakes, and feedback is welcome.</p>      <br>
<p>My main interest is the evolution of the human mind and the recognition that computer programming will always be limited and flawed as we seek to merge with ever higher intelligences - intuition, and soul fusion. Just like the Big Bang theory, the latest avant-garde programming techniques only represent the most recently accepted lie about reality.</p>
I'm reminded of a funny story. Cutting edge scientist make a break through discovery. They are able to send man at Warp Factor 10 through Space. Some budding astronauts rocket off to a distant plant three light years away.

<br>

</section>
          <section>
            <h2>Error Handling </h2>
            <article>
              <h3>Handling runtime errors in JavaScript using try/catch/finally</h3>
              <aside class="pull-sm-right" style="width:260px;">As an aside, I would like to discuss catching errors in the human psyche.</aside>
              <p>try/catch/finally are so called exception handling statements in JavaScript. An exception is an error that occurs at runtime due to an illegal operation during execution. Examples of exceptions include trying to reference an undefined variable, or calling a non existent method. This versus syntax errors, which are errors that occur when there is a problem with your JavaScript syntax.</p>
              <p>try/catch/finally lets you deal with exceptions gracefully. It does not catch syntax errors, however (for those, you need to use the onerror event). Normally whenever the browser runs into an exception somewhere in a JavaScript code, it displays an error message to the user while aborting the execution of the remaining code. You can put a lid on this behaviour and handle the error the way you see fit using try/catch/finally. At its simplest you'd just use try/catch to try and run some code, and in the event of any exceptions, suppress them: </p>

            </article>
          </section>
          <section>
            <h2 id="Global_Objects">Global Objects </h2>
            <section>
              <h3>Object Methods
                     </h3>
              <article>
                <h4>Object.assign(target, ...sources) </h4>
                <div class="codeApp">
<pre  id="objAss1">// Object.assign()

// First create an object with couple of prototype props.
a = {xxx:'x',yyy:'y',zzz:'z'}
b = Object.create(a)
b.name="bhakti"
b.age=46

b.propertyIsEnumerable('name') // true
b.propertyIsEnumerable('xxx') // false, cos on proto of b

// Create basic object
c = {c1:'x',c2:'y'}

// stuff c into b
d = Object.assign(b,c)

// Notice that proto props of 'b' remain in tact since we are adding src c to target b
// As well as 'd' being assigned new object, 'b' has now changed.

d===b // true

// They are the same object.
b.propertyIsEnumerable('c1') // true

// This does not reveal properties accessible on the prototype,
// which is actually what we are interested in here.
console.log('Stringified: ',JSON.stringify(d))

console.log('\n// Include prototype properties using a for in loop:')
for (var prop in d) {
console.log(prop)
}</pre>

      <button class="objAss1 btn btn-success" onClick="codeApp.doDemo('objAss1')">Run Code</button>
                </div>
                <p>But, when on the source object, proto is lost
                </p>
                <div class="codeApp"> <pre id="objAss2">
 let a = {xxx:'x',yyy:'y'};
 let b = Object.create(a);
 b.name="bhakti";
 b.age=46

 // Include prototype props
console.log(`// List all props on 'b':`)
for (var prop in b) {
console.log(prop)
}

 // Create basic object
 let c = {c1:'x',c2:'y'}

 // Proto props on b are lost, when b is src obj.
 let d= Object.assign(c,b) ;

 // Include prototype props
console.log(`\n// List all props on 'd':`)
for (var prop in d) {
console.log(prop)
}

 </pre>
  <button onClick="codeApp.doDemo('objAss2')" class="objAss2 btn btn-success ">Run Code</button></div>
                // See https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/isExtensible // for deprecated and thumbs down</article>
              <h4>Object.create()
                     </h4>
              <h4>Object.defineProperties()
                     </h4>
              <h4>Object.defineProperty()</h4>
              <h3>Iteration over Objects
                         </h3>
              <div class="codeApp">
                <pre id="objIter1">// First create a an object to act as a prototype, so we can observe certain behaviour when looping through objects
 let x = {
     proto: 'I sit on prototype',
     doIt() { log('Doing It!') }
 }

 // Create a new object with x as its prototype
 let env = Object.create(x) // environment

 // Add some props to our object
 env.a = { apple: 'cox', apricot: 'yellow' } // proto of a is Object with all its methods
 env.b = { bamboo: 'shoot', barrow: 'garden' }
 env.c = { cabbage: 'white', chariot: 'krishna' }
 env.d = { dart: 'arrow', demon: 'process' }
 env.e = { era: 'bronze', elf: 'LoTR' }
 env.f = { freight: 'container', fried: 'eggs' }

console.log('// Include prototype properties using a *for in* loop.')
for (var prop in env) {
  console.log(prop)
}

// Use hasOwnProperty to exclude props on any prototype
 console.log('\n\n//List all own properties (enumerable), using *for in* and hasOwnProperty filter:')

 for (var prop in env) {
      if (env.hasOwnProperty(prop)) {
         console.log(prop)
     }
 }


 console.log('\n// List all own props using Object.keys():')

Object.keys(env).forEach(function(key, index) {
 if (env.hasOwnProperty(key)) console.log('key: ', key, ', index: ', index)
     // key: the name of the object key
     // index: the ordinal position of the key within the object
});

console.log('\n// List all ownProps of each sub prop using Object.keys():')
              Object.keys(env).forEach(function(key, index) {
               if (env.hasOwnProperty(key)) {

                   console.log('key: ', key, ', index: ', index)

                   Object.keys(env[key]).forEach(function(subkey, index) {
                       if (env[key].hasOwnProperty(subkey)) {

                           console.log('subkey: ', subkey, ', index: ', index)
                       }

                   });
               }

              });</pre>
                <button onClick="codeApp.doDemo('objIter1')" class="objIter1 btn btn-success">Run Code</button>
              </div>
            </section>
          </section>
          <section>
            <h2>Built-In Objects</h2>
            <section>
              <h3>JSON</h3>
              <section>
                <h4>JSON.stringify()</h4>
                <p>See how prototypal properties & methods are ignored. It's a bit like ripping up a dandelion, but you know the roots have been left behind.</p>
                <div class="codeApp"> <pre id="stringify1">
 let a = {xxx:'x',yyy:'y'};
 let b = Object.create(a);
 b.name="bhakti";
 b.age=46

console.log('// List all props in *b* including prototypal props:')
for (var prop in b) {
console.log(prop)
}

  b = JSON.stringify(b); // So you can 'read' the obj

 console.log('\n// *b* stringified: ')
 console.log(b)

  b = JSON.parse(b); // Convert back into obj.

 // Include prototype props, but hang on a sec, where are they?!
console.log('\n// List all props in *b* including prototypal props:')
for (var prop in b) {
console.log(prop)
}</pre>
                  <button onClick="codeApp.doDemo('stringify1')" class="stringify1 btn btn-success">Run Code</button></div>
              </section>
            </section>
            <section>
              <h3>eval()</h3>
              <section id="delEval">
                <h4>Deleting declared variable with eval()</h4>
                <pre><code id="delEval">let myCode= `var a=1;
              console.log('Before delete a = ',a);
              delete a;
               console.log('After delete a = ',a)`;

console.log(eval(myCode));
</code></pre>
              </section>
            </section>

          </section>

<section>
            <h2>Expressions & Operators</h2>
            <section>
              <h3>Logical Operators</h3>
              <h4>Existence & Booleans</h4>

<p>An <code>if</code> statement will try to coerce an expression into a boolean result.</p>
There is one caveat. If <code>a</code> were set to 0, whilst it is a value that exists and is assigned to <code>a</code>, it returns <code><i>false</i></code>. See below for a workaround.

<div class="codeApp"> <pre id="exBoo">

var a = 1
if (a) console.log('When a set to 1, value on a exists')

var a = 0
if (a) console.log('Im just not gonna show up today!')

var a = 0
if (a || a===0) console.log('When a set to 0, and with special chk for 0, value on a exists.')


</pre>
                  <button onClick="codeApp.doDemo('exBoo')" class="exBoo btn btn-success">Run Code</button></div>


            </section>

            <section>
                <h3>delete operator</h3>
                <a href="http://perfectionkills.com/understanding-delete/" target="_blank">http://perfectionkills.com/understanding-delete/</a>
                <br>
                <a href="#delEval">See also...</a>
              </section>

              <h3>Operator Precedence</h3>

              <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Operator_Precedence#Table">Operator Precedence Chart</a>

          </section>

        </section>
<?php
include "footer.htm";
?>