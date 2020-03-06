<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <script src="/public/js/pixi.js"></script>
    <title>Document</title>
</head>
<body style="margin: 0; overflow: hidden">
<script>
    class Circle{
        color;
        x_pos;
        y_pos;
        radius;
        x_speed = 2;
        y_speed = randomInteger(1, 5);
        obj;
        mass = 0.1;
        constructor(color, x_pos, y_pos, radius) {
            this.color = color;
            this.x_pos = x_pos;
            this.y_pos = y_pos;
            this.radius = radius;
        }
        render(){
            const human = new PIXI.Graphics();
            human.lineStyle(0); // draw a circle, set the lineStyle to zero so the circle doesn't have an outline
            human.beginFill(this.color, 1);
            human.drawCircle(this.x_pos, this.y_pos, this.radius);
            human.endFill();
            app.stage.addChild(human);
            this.obj = human;
            container.addChild(human)
        }
        move(obj_list){
            this.collision(obj_list);
            this.obj.x += this.x_speed;
            this.x_pos = this.obj.x;
            this.obj.y += this.y_speed;
            this.y_pos = this.obj.y;


        }
        collision(obj_list){
            if(this.obj.getBounds().x >= 800-this.radius*2 || this.obj.getBounds().x <= 0){
                this.x_speed *= -1;
            }
            if(this.obj.getBounds().y >= 600-this.radius*2 || this.obj.getBounds().y <= 0){
                this.y_speed *= -1;
            }
        }
        draw_line(obj_list){
            let obj = this.obj;
            let x = this.x_pos;
            let y = this.y_pos;
            let color = 0x00FF00;
            let  r = this.radius;
            let count = 0;
            container.children.forEach(function (element) {
                if(element !== obj){
                    let line = new PIXI.Graphics();
                    line.lineStyle(1, color, 1);
                    line.moveTo(obj.getBounds().x+r, obj.getBounds().y+r);
                    line.lineTo(element.getBounds().x+r, element.getBounds().y+r);
                    app.stage.addChild(line);
                    setTimeout(function () {
                        line.clear();
                    }, 1)
                }
                count++;
            });
        }
    }

    function rndColor() {
        var hex = '0123456789ABCDEF'.split(''),
            color = '0x', i;
        for (i = 0; i < 6 ; i++) {
            color = color + hex[Math.floor(Math.random() * 16)];
        }
        return color;
    }
    const app = new PIXI.Application({
        width: 800, height: 600, backgroundColor: 0x000000, resolution: window.devicePixelRatio || 1,
    });
    function randomInteger(min, max) {
        // случайное число от min до (max+1)
        let rand = min + Math.random() * (max + 1 - min);
        return Math.floor(rand);
    }
    document.body.appendChild(app.view);
    const container = new PIXI.Container();
    app.stage.addChild(container);
    let circle_arr  = [];
    let r = 2;
    let dimension = 2;
    let x = 400;
    let y = 300;
    for(let i=0; i < 1+dimension; i++){
        let xy;
        if(i !== 0){
            if(i === 1){
                xy = circle_arr[i-1].obj.getBounds();
                y = xy.y+50;
            }
            else if(i === 2){

            }
        }
        let circle = new Circle(rndColor(), x, y, r);
        circle.render();
        circle_arr[i] = circle;
    }
/*    app.ticker.add((delta) => {
        circle_arr.forEach(function (element) {
            //element.move(circle_arr);
            //element.draw_line(circle_arr)
        });
    });*/
</script>

<!--    <script type="module">


        /* class Circle{
        obj;
        direction = {x: 1, y: 1};
        x_pos;
        y_pos;
        radius;
        x_speed = 1.5;
        y_speed = 1.5;
        color;
        angle = 0;
        constructor(x_pos, y_pos, radius, color) {
            this.x_pos = x_pos;
            this.y_pos = y_pos;
            this.radius = radius;
            this.color = color;
            this.random_direction();
        }

        set_direction(dir){
            this.direction = dir;
        }
        random_direction(){
            let rndX = randomInteger(1, 200);
            let rndY = randomInteger(1, 500);
            let dirX;
            let dirY;
            if(rndX >= 100){
                dirX = -1;
            }
            else{
                dirX = 1;
            }
            if(rndY >= 150){
                dirY = -1;
            }
            else{
                dirY = 1;
            }
            this.direction.x *= dirX;
            this.direction.y *= dirY;
        }
        setXSpeed(x_speed){
            this.x_speed = x_speed;
        }
        setYSpeed(y_speed){
            this.y_speed = y_speed;
        }
        collisionDetect(start, end){
            let collisionLeft = this.xCollisionLeft(end);
            let collisionRight = this.xCollisionRight(start);
            let collisionTop = this.yCollisionTop(start);
            let collisionBottom = this.yCollisionBottom(end);
            if (collisionLeft){
                this.direction.x = -1;
            }
            if(collisionRight){
                this.direction.x = 1;
            }
            if(collisionTop){
                this.direction.y = 1;
            }
            if(collisionBottom){
                this.direction.y = -1;
            }
        }
        xCollisionLeft(point){
            return (this.obj.getBounds().x + this.radius) > point;
        }
        xCollisionRight(point){
            return (this.obj.getBounds().x + this.radius) < point;
        }
        yCollisionTop(point){
            return (this.obj.getBounds().y + this.radius) < point;
        }
        yCollisionBottom(point){
            return (this.obj.getBounds().y + this.radius) > point;
        }
        move(circle_array){
            this.collisionDetect(0, 100);
            this.collisionObject(circle_array);
            this.obj.x += this.x_speed*this.direction.x;
            this.obj.y += this.y_speed*this.direction.y;
            this.x_pos = this.obj.x;
            this.y_pos = this.obj.y;
            this.angle +=0.01
        }
        collisionObject(objectCollection){
            let thisObject = this.obj;
            let thisRadius = this.radius;
            let thisXPos = this.x_pos;
            let thisYPos = this.y_pos;
            let thisDirection = this.direction;
            objectCollection.forEach(function (element) {
                if(thisObject !== element.obj){
                    if(thisXPos+element.radius === element.x_pos+element.radius){
                        thisDirection.x *= -1;
                        element.direction.x *= 1;
                    }
                    if(thisYPos+element.radius === element.y_pos+element.radius){
                        thisDirection.y *= -1;
                        element.direction.y *= -1;
                    }
                }
            });
            this.direction = thisDirection;
        }
        render(){
            let circle = new PIXI.Graphics();
            circle.beginFill(this.color, 1);
            circle.drawCircle(this.x_pos, this.y_pos, this.radius);
            circle.endFill();
            this.obj = circle;
            app.stage.addChild(circle);
        }

        }*/
        /*class MainObject{
        object;
        x_pos;
        y_pos;
        setXPos(xPos){
           this.x_pos = xPos;
        }
        setYPos(yPos){
            this.y_pos = yPos;
        }
        getXPos(){
          return this.x_pos;
        }
        getYPos(){
           return this.y_pos;
        }
        setObject(object){
           this.object = object;
        }
        getObject(){
           return this.object;
        }
        render(){

        }
        }
        class Circle extends MainObject{
        direction = {x: 1, y: 1};
        radius;
        sound;
        sound_circle;
        color='0#FFFFFF';
        angle = 0;
        constructor(x_pos, y_pos, radius, color) {
            super();
            super.x_pos = x_pos;
            super.y_pos = y_pos;
            this.radius = radius;
            this.color = color;
            this.random_direction();
        }
        randomInteger(min, max) {
            // получить случайное число от (min-0.5) до (max+0.5)
            let rand = min - 0.5 + Math.random() * (max - min + 1);
            return Math.round(rand);
        }
        random_direction(){
            let rndX = randomInteger(1, 200);
            let rndY = randomInteger(1, 500);
            let dirX;
            let dirY;
            if(rndX >= 100){
                dirX = -1;
            }
            else{
                dirX = 1;
            }
            if(rndY >= 150){
                dirY = -1;
            }
            else{
                dirY = 1;
            }
            this.direction.x *= dirX;
            this.direction.y *= dirY;
        }
        borderCollisionTop(border){
            if(super.getYPos() <= border.end.y){
                this.direction.y *= -1
            }
        }
        borderCollisionLeft(border){
            if(super.getXPos() >= border.end.x){
                this.direction.x *= -1
            }
        }
        borderCollisionRight(border){
            if(super.getXPos() <= border.end.x){
                this.direction.x *= -1
            }
        }
        borderCollisionBottom(border){
            if(super.getYPos() >= border.end.y){
                this.direction.y *= -1
            }
        }
        borderCollisionDetector(border_list){
            this.borderCollisionTop(border_list[0]);
            this.borderCollisionLeft(border_list[1]);
            this.borderCollisionRight(border_list[2]);
            this.borderCollisionBottom(border_list[3]);
        }
        make_sound(){
            let rnd = randomInteger(1, 100);
            if(rnd >= 1 || rnd <= 100){
                this.sound = randomInteger(50, 75);
                let circle = new PIXI.Graphics();
                circle.beginFill(0xFF0000, 0.1);
                circle.drawCircle(this.x_pos, this.y_pos, this.sound);
                circle.endFill();
                this.sound_circle = circle;
                app.stage.addChild(circle);
            }
            else{
                this.sound_circle = 0;
            }

        }
        getDirectionX(){
            return this.direction.x;
        }
        getDirectionY(){
            return this.direction.y;
        }
        getObject() {
            return super.getObject();
        }

        render(){
            this.make_sound();
            let circle = new PIXI.Graphics();
            circle.beginFill(this.color, 1);
            circle.drawCircle(this.x_pos, this.y_pos, this.radius);
            circle.endFill();
            super.setObject(circle);
            app.stage.addChild(circle);
        }
        }
        class Human extends Circle{
        x_speed = 1.5;
        y_speed = 1.5;
        object;
        constructor(x_pos, y_pos, radius, color) {
            super(x_pos, y_pos, radius, color);
        }
        move(object_array){
            super.borderCollisionDetector(object_array['border_obj']);
            //super.make_sound()
            this.object.x += this.x_speed*super.getDirectionX();
            this.object.y += this.y_speed*super.getDirectionY();
            super.setXPos(this.object.x);
            super.setYPos(this.object.y);
        }
        render() {
            super.render();
            this.object = super.getObject();
        }
        }
        class Border extends MainObject{
        color = 0x00FF00;
        start;
        end;
        constructor(start, end) {
            super();
            this.start = start;
            this.end = end;
            super.setXPos(start);
            super.setYPos(end);

        }
        setStart(start){
            this.start = start;
        }
        setEnd(end){
            this.end = end;
        }
        render() {
            const realPath = new PIXI.Graphics();
            realPath.lineStyle(2, this.color, 1);
            realPath.moveTo(this.start.x, this.start.y);
            realPath.lineTo(this.end.x, this.end.y);
            realPath.position.x = 0;
            realPath.position.y = 0;
            super.setObject(realPath);
            app.stage.addChild(realPath);
        }
        }


        function randomInteger(min, max) {
        // получить случайное число от (min-0.5) до (max+0.5)
        let rand = min - 0.5 + Math.random() * (max - min + 1);
        return Math.round(rand);
        }
        const app = new PIXI.Application({
        width: 500, height: 500, backgroundColor: 0x1099bb, resolution: window.devicePixelRatio || 1,
        });
        document.body.appendChild(app.view);

        const container = new PIXI.Container();

        app.stage.addChild(container);

        let object_array = {
        human_obj: [],
        border_obj: [],
        zombie_obj: [],
        };
        let circle = new Circle();
        for(let i = 0; i<1; i++){
        let human = new Human(randomInteger(1, 500), randomInteger(1, 500), 1, 0xFFFFFF);
        human.render();
        object_array['human_obj'][i] = human;
        }
        for(let i = 0; i<2; i++){
        let zombie = new Circle(randomInteger(1, 500), randomInteger(1, 500), 1, 0xFF0000);
        zombie.render();
        object_array['zombie_obj'][i] = zombie;
        }

        let top_border = new  Border({x: 0, y: 0}, {x: 500, y: 0});
        let left_border = new  Border({x: 500, y: 0}, {x: 500, y: 500});
        let right_border = new  Border({x: 0, y: 0}, {x: 0, y: 500});
        let bottom_border = new  Border({x: 500, y: 500}, {x: 0, y: 500});
        top_border.render();
        left_border.render();
        right_border.render();
        bottom_border.render();
        object_array['border_obj'][0] = top_border;
        object_array['border_obj'][1] = left_border;
        object_array['border_obj'][2] = right_border;
        object_array['border_obj'][3] = bottom_border;
        let human_obj = object_array['human_obj'];
        console.log(human_obj)
        console.log(object_array)
        app.ticker.add((delta) => {
        human_obj.forEach(function (element) {
            //console.log(element)
            element.move(object_array);
        })
        //console.log()
        /!*object_array.forEach(function (element) {
           console.log(element);
           //element.move()
        })*!/
        });*/

    </script>-->
</body>
</html>