import * as PIXI from '/public/js/pixi.js';

export default class Game {
    height;
    width;
    background_color;
    app;
    container;
    graphics;
    constructor(width, height, background_color) {
        this.width = width;
        this.height = height;
        this.background_color = background_color;
    }
    setApp(app){
        this.app = app;
    }
    setContainer(container){
        this.container = container;
    }
    setGraphics(graphics){
        this.graphics = graphics;
    }
    addCircle(){
        this.container.addChild();
    }
    gameInit(){
        const app = new PIXI.Application({});
    }
}
