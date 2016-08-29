
let codeApp = (function() {

    /**
     * codeApp
     * 
     * Before prettify has chance to format code in a <pre> tag 
     * (which means mixing in many html elements to allow css rules to be applied),
     * ie before prettyPrint() is run, codeApp pulls out all code in <pre> tags and stuffs into an obj.
     * 
     * 
     */


    /*
      - codeApp - HTML min structural requirements

        <div class = "codeApp">
            <pre id = "[demoId]">
            // Code here
            </pre>
        <a onClick = "codeApp.doDemo('[demoId]')" class = "[demoId] jsfiddle" >Run Code</a>
         </div>
    */



    // Private Vars

    // container obj for code
    let data = {}



    // Need to create as global to app so that we can keep referencing the original console obj.
    // Also max callstack exceeded when making a sandwhich out of console obj!!
    // ie keep changing previous perversion of log method each time doDemo called.
    let log_orig = console.log;

    /**
     * CONSOLE.LOG - Customize console.log for app
     * http://stackoverflow.com/questions/11403107/capturing-javascript-console-log
     */
    let defConsoleLog = (demoId) => {

        // Looks like orig method is augmented...?
        console.log = function(...args) {

            // Perhaps unnecessary checks now...
            if (/^[a-z0-9]+$/i.test(demoId)) { // get weird err msg when demoId contains eg spaces in nxt line
                if ($('pre#' + demoId).length === 1) { // does elem exist
                    args.forEach(function(arg, i) {

                        $('pre#' + demoId + '_output').append(arg + '');

                    });
                     $('pre#' + demoId + '_output').append('\n');
                }

            }
            log_orig.apply(console, arguments);
        };

        console.error = console.debug = console.info = console.log
    }




    /**
     * Extracts code from visible div, sends through compiler,
     * sends output to newly created <pre> node whilst still doing traditional console.log.
     *
     * @param      {string}  demoId  Elem ID of PRE tag holding code to clone
     */
    var doDemo = function(demoId) {

        if (!jQuery.isEmptyObject(data)) {

            // Create new node for code out
            // NB class=output to distinguish from original pre tag
            let newElem = $(`<pre id="${demoId}_output" class="prettyprint linenums lang-js"></pre>`)
                .insertAfter($("pre#" + demoId))
                .hide()

            $(`<p><i>View this code also in browser console  - Win <kbd>Ctl+Sh+I</kbd> or <kbd>F12</kbd> | Mac <kbd>Cmd+Opt+I</kbd>.</i></p>`)
                .insertAfter(newElem)


            // Extract js text in pre tag and send through js compiler
            // See custom console.log, where output piped to above created pre tag

            // Wrap in IFEE to avoid namespace pile ups. Preceding semi colon to prevent err when omitting semi colons from previous lines.
            let codeToEval = ";(function() {"
                // Get code from data obj property
            codeToEval += data[demoId]
            codeToEval += "})();"

            //console.log(codeToEval)

            // redefine console.log method so that output from evaluated code piped to new pre tag
            defConsoleLog(demoId)

            eval(codeToEval) // run code

            // Re-run pretiffy js (on new tag) to get numbering and formatting.
            prettyPrint()

            newElem.slideToggle('slow') // reveal and slide out new tag 

            $('div.codeApp button.' + demoId).remove()
            $('div.codeApp a.' + demoId).remove()

        } else {
            return false
        }
    };


    // Stuff all <pre> code with ids into object before tainted by prettify
    let grabCode = () => {

        $('pre').each(function() {

            let demoId = $(this).attr('id');
            // dynamic obj prop assignment
            data[demoId] = $(this).text()
        });
    }

    // Prettify
    let doPrettify = () => {
        $('pre').addClass('prettyprint linenums lang-js');
        prettyPrint();
    };

    let doInit = () => {
        grabCode()
        doPrettify()
    };

    return {
        doInit,
        doDemo,
        data
    }

})();
