class JohnUploader{
    url;
    fileField;
    vollay;

    /**
     *
     * @param url 文件上传的地址
     * @param fileField 一个"文件域"对象
     * @param vollay 一个HTMLElement对象，做为img的容器
     */
    constructor(url,fileField,vollay){
        this.url=url
        this.fileField=fileField
        this.vollay=vollay
    }

    /**
     * @param nf 一个新的"文件域对象"
     * 由于"文件域"是不能够改变内容，所以需要改变这个属性
     */

    setFileField(nf){
        this.fileField=nf
    }

    /**
     * 本函数的触发时机--文件域的改变事件
     * 作用：在画廊中显示选中的图片
     */
    selectionShow() {
        this.vollay.innerHTML="";
        let files = this.fileField.files;
        for (let i = 0; i < files.length; i++) {
            let file = files[i]
            if(!file.isRemoved) {
                let reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = event=> {
                    let img = document.createElement('img')
                    img.src = reader.result
                    //点击图片删除（以后改成点击图片上的"删除logo"）
                    img.onclick = event=> {
                        //为文件加入删除标记
                        file.isRemoved=true
                        //重新刷新画廊，从而不显示有删除标记的文件
                        this.selectionShow()
                    }
                    this.vollay.appendChild(img)
                }
            }
        }
    };

    /**
     * //根据给定的表单域，完成文件上传
     * @param callback 文件上传完毕的回调函数，callback中的参数为：xhr.reponseText
     */

    uploadFile(callback) {
        let formData=new FormData();
        let files = this.fileField.files;

        if(files.length==0||files===null){
            alert("没有选择上传文件！")
            return;
        }
        for (let i = 0; i < files.length; i++) {
            let file=files[i]
            //如果文件没有加删除标记
            if(!file.isRemoved)
                formData.append('avatar',files[i],files[i].name);
        }
        let xhr=new XMLHttpRequest();
        xhr.open("POST",this.url)
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                callback(xhr.responseText)
            }
        }
        xhr.send(formData)
    }
}