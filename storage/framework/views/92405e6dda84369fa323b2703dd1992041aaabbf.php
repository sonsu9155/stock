<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="keywords" content="" />
    <meta name="description" content="股票交易系统">
    <meta name="author" content="" />
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="telephone=no" name="format-detection">
    <link href="/css/global-ver.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script type="/js/javascript" src="js/ymPrompt.js"></script>
    <script>
        function Message(id) {
            ymPrompt.win({
                message: './message.php?type=read&id=' + id,
                width: 300,
                height: 370,
                title: '阅读短信',
                iframe: true,
                handler: function() {
                    self.location.href = self.location.href;
                }
            });
        }
    </script>
    <style>
        a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body style=" font-size:12px;">
    <div data-role="page" id="pagetwo">
        <div class="include" file="/header.blade.php"></div>
        <div style="margin-top:47px;  solid #eeeeee; width:100%; height:24px; text-align:center; color:#FFFFFF;">
            <table cellspacing="0" cellpadding="0" border="1" bordercolor="#eeeeee" style="width:100%; border:1 solid #eeeeee; font-size:13px;">
                <tr>
                    <th align="center" style=" height:30px;display:none;">编号</th>
                    <th align="center" style="width:20%; height:30px; border:1 solid #eeeeee;">发送用户</th>
                    <th style="width:30%;height:30px; border:1 solid #eeeeee;">标题</th>
                    <th style="width:40%;height:30px; border:1 solid #eeeeee;">内容</th>
                    <th align="center" style="height:30px; border:1 solid #eeeeee;display:none;">时间</th>
                    <th align="center" style="width:10%;height:30px; border:1 solid #eeeeee;">标识</th>
                </tr>
                <?php if($threads): ?>
                    <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="even">
                        <td align="center" style=" display:none;height:30px;"></td>
                        <td align="center">管理员发送</td>
                        <td ><?php echo e($thread->subject); ?></td>
                        <td ><?php echo e($thread->messages[0]->body); ?></td>
                        <td align="center" style="display:none;"><?php echo e($thread->created_at); ?></td>
                        <td align="center">已读</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <!-- <tr>
                    <td colspan="6" align="center">
                        <div style="width:100%;">
                            <table align="center" cellpadding="0" cellspacing="0" style="width:100%;border:1px solid #eeeeee;">
                                <tr align="center">
                                    <td width="16%"><a id='page_first' href="/wapxiaoxi.php?PageNum=">首页</a></td>
                                    <td width="16%"><a id='page_prev' href="/wapxiaoxi.php?PageNum=">上页</a></td>
                                    <td width="16%"><a class="cur" href="javascript:void(0);">1</a></td>
                                    <td width="16%"><a id='page_next' href="/wapxiaoxi.php?PageNum=">下页</a></td>
                                    <td width="16%"><a id='page_last' href="/wapxiaoxi.php?PageNum=">尾页</a></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr> -->
            </table>
        </div>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
    <div class="include" file="/footer.blade.php"></div>
    <script type="text/javascript">
        $(".include").each(function() {
            if (!!$(this).attr("file")) {
                var $includeObj = $(this);
                $(this).load($(this).attr("file"), function(html) {
                    $includeObj.after(html).remove(); //加载的文件内容写入到当前标签后面并移除当前标签
                })
            }
        });
    </script>
    </div>
</body>

</html>
