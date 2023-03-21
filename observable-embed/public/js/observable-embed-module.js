

jQuery(window).load(function () {
    console.log("test");
    if (window.observableCells === undefined) return false;
    if (window.observableCells.length == 0) return false;

    //iterate through the cells and attach a DOM element (div whose named was generated in class-observable-embed-public.php)
    window.observableCells.forEach(cell => {
        cell.DOMselection = document.querySelector("#" + cell.div)
    });

    //import {Runtime, Inspector} from "https://cdn.jsdelivr.net/npm/@observablehq/runtime@5/dist/runtime.js";
    import(window.observableCells[0].runtime).then(({ Runtime, Inspector, Library }) => {

        import(window.observableCells[0].notebook).then((notebook) => {

            console.log(window.observableCells);

            const library = new Library();
            const runtime = new Runtime(library);
            var main;

            if (window.observableCells[0].cell === '') {
                //no cell name defined, embed entire notebook
                main = runtime.module(notebook.default, Inspector.into(window.observableCells[0].DOMselection));
            } else {

                main = runtime.module(notebook.default, name => {        //iterate through every cell in the notebook
                    //console.log("evaluating " + name);
                    const thisCell = window.observableCells.find(d => d.cell === name); //locate the cell with matching name
                    if (thisCell !== undefined) { //if there is a match
                        return new Inspector(thisCell.DOMselection); //attach observable cell to this DOM element
                    }
                    else return true; //allow cells that aren't rendered to still mutate (run with side effects)
                });
            }

            // Redefine width as a generator that yields the chart element’s clientWidth (if
            // changed) whenever the window resize event fires. If desired, use a
            // ResizeObserver instead; see the custom-fluid-width-and-height example.
            //main.redefine("width", 640);

            main.redefine("width", library.Generators.observe(notify => {
                let width = notify(window.observableCells[0].DOMselection.clientWidth); // initial width
                //console.log("width: " + width);
                function resized() {
                    let newWidth = window.observableCells[0].DOMselection.clientWidth;
                    if (newWidth !== width) {
                        //console.log("width resized to: " + newWidth);
                        notify(width = newWidth);
                    }
                }
                addEventListener("resize", resized);
                return () => removeEventListener("resize", resized);
            }));
        }).catch(error => {
            console.error(error);
        })
    }).catch(error => {
        console.error(error);
    })

})