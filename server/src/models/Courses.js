module.exports = (sequelize, DataTypes) => {
  const Courses = sequelize.define(
    "Courses",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      slug: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      certificate: {
        type: DataTypes.BOOLEAN,
        allowNUll: false,
      },
      thumbnail: {
        type: DataTypes.STRING,
        allowNull: true,
      },
      type: {
        type: DataTypes.STRING,
        allowNUll: true,
      },
      status: {
        type: DataTypes.ENUM,
        values: ["draft", "published"],
      },
      price: {
        type: DataTypes.DOUBLE,
      },
      level: {
        type: DataTypes.ENUM,
        values: ["all-level", "beginner", "intermediate", "advanced"],
      },
      description: {
        type: DataTypes.TEXT,
      },
      excerpt: {
        type: DataTypes.TEXT,
      },
      mentor_id: {
        type: DataTypes.INTEGER,
      },
      roadmap_id: {
        type: DataTypes.INTEGER,
      },
      category_id: {
        type: DataTypes.INTEGER,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "courses",
      timestamps: true,
    }
  );
  Courses.associate = (models) => {
    Courses.hasMany(models.Chapters, {
      foreignKey: "course_id",
    });
    Courses.belongsTo(models.Mentor, {
      foreignKey: "mentor_id",
    });
    Courses.belongsTo(models.Category, {
      foreignKey: "category_id",
    });
    Courses.hasMany(models.Reviews, {
      foreignKey: "course_id",
    });
  };
  return Courses;
};
