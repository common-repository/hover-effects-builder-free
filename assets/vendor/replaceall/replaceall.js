String.prototype.hiReplaceAll = function( e, t )
{
    var n = this;
    return n.replace( new RegExp( e, "g" ), t );
}